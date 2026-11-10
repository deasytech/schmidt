<?php

namespace App\Console\Commands;

use App\Support\Img;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class OptimizeImages extends Command
{
    protected $signature = 'images:optimize';
    protected $description = 'Pre-generate responsive WebP variants into the public disk _cache folder (originals are untouched)';

    public function handle()
    {
        $disk = Storage::disk('public');
        $n = 0;
        foreach ($disk->allFiles() as $file) {
            if (strpos($file, '_cache/') === 0 || !preg_match('/\.(jpe?g|png)$/i', $file)) {
                continue;
            }
            foreach (Img::WIDTHS as $w) {
                Img::variant($file, $w) && $n++;
            }
        }
        // Static images under public/img are referenced as "public:img/...".
        if (is_dir(public_path('img'))) {
            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(public_path('img'), \FilesystemIterator::SKIP_DOTS));
            foreach ($it as $f) {
                if (!$f->isFile() || !preg_match('/\.(jpe?g|png)$/i', $f->getFilename())) {
                    continue;
                }
                $rel = 'public:img/' . str_replace('\\', '/', substr($f->getPathname(), strlen(public_path('img')) + 1));
                foreach (Img::WIDTHS as $w) {
                    Img::variant($rel, $w) && $n++;
                }
            }
        }
        $this->info("Variants available: {$n}");
        return 0;
    }
}
