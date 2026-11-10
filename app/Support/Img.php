<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

/**
 * Responsive image variants for the public site.
 *
 * Resized WebP copies are generated lazily from the original upload into
 * `<public disk>/_cache/<width>/...`. Originals are never modified. If a
 * variant cannot be produced (unsupported format, missing GD/WebP, error)
 * the original URL is returned, so pages always render.
 */
class Img
{
    public const WIDTHS = [480, 800, 1200, 1800];

    private static function disk()
    {
        return Storage::disk('public');
    }

    /** Whether a stored path is a raster type we can resize. */
    private static function resizable(string $path): bool
    {
        return (bool) preg_match('/\.(jpe?g|png)$/i', $path);
    }

    /** Paths prefixed "public:" refer to static files under public/ (e.g. "public:img/2.jpg"). */
    private static function isStatic(string $path): bool
    {
        return strpos($path, 'public:') === 0;
    }

    private static function sourceExists(string $path): bool
    {
        return self::isStatic($path) ? is_file(public_path(substr($path, 7))) : self::disk()->exists($path);
    }

    private static function sourcePath(string $path): string
    {
        return self::isStatic($path) ? public_path(substr($path, 7)) : self::disk()->path($path);
    }

    private static function sourceMtime(string $path): int
    {
        return self::isStatic($path) ? filemtime(self::sourcePath($path)) : self::disk()->lastModified($path);
    }

    /** URL of the untouched original. */
    public static function original(?string $path): string
    {
        if (!$path) {
            return '';
        }
        return self::isStatic($path) ? asset(substr($path, 7)) : self::disk()->url($path);
    }

    /**
     * Generate (if needed) the variant of $path at $width and return its stored path,
     * or null when it cannot be produced.
     */
    public static function variant(string $path, int $width): ?string
    {
        if (!self::resizable($path) || !function_exists('imagewebp')) {
            return null;
        }
        $disk = self::disk();
        if (!self::sourceExists($path)) {
            return null;
        }
        $target = '_cache/' . $width . '/' . (self::isStatic($path) ? '_static/' . substr($path, 7) : $path) . '.webp';
        try {
            if ($disk->exists($target) && $disk->lastModified($target) >= self::sourceMtime($path)) {
                return $target;
            }
            $abs = self::sourcePath($path);
            $out = $disk->path($target);
            if (!is_dir(dirname($out))) {
                mkdir(dirname($out), 0755, true);
            }
            $tmp = $out . '.' . uniqid('', true) . '.tmp';
            Image::configure(['driver' => 'gd']);
            $img = Image::make($abs)->orientate();
            if ($img->width() > $width) {
                $img->resize($width, null, function ($c) {
                    $c->aspectRatio();
                });
            }
            file_put_contents($tmp, (string) $img->encode('webp', 78));
            rename($tmp, $out); // atomic: concurrent requests never see a partial file
            return $target;
        } catch (\Throwable $e) {
            Log::warning('Img variant failed for ' . $path . ': ' . $e->getMessage());
            return null;
        }
    }

    /** URL of the variant at $width, or the original when unavailable. */
    public static function src(?string $path, int $width = 800): string
    {
        if (!$path) {
            return '';
        }
        $v = self::variant($path, $width);
        return $v ? self::disk()->url($v) : self::original($path);
    }

    /** srcset covering the standard widths; empty string when variants are unavailable. */
    public static function srcset(?string $path, array $widths = self::WIDTHS): string
    {
        if (!$path) {
            return '';
        }
        $parts = [];
        foreach ($widths as $w) {
            $v = self::variant($path, $w);
            if (!$v) {
                return '';
            }
            $parts[] = self::disk()->url($v) . ' ' . $w . 'w';
        }
        return implode(', ', $parts);
    }
}
