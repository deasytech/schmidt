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
        $this->info("Variants available: {$n}");
        return 0;
    }
}
