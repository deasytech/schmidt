<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

/**
 * Runs a fixed set of maintenance commands over HTTP for hosts without SSH.
 * Disabled (404) unless DEPLOY_TOKEN is set in .env to a long random value.
 * Remove DEPLOY_TOKEN from .env when finished.
 */
class DeployController extends Controller
{
    private const TASKS = ['migrate', 'storage-link', 'optimize-clear', 'images'];

    public function run(Request $request, string $task)
    {
        $token = (string) env('DEPLOY_TOKEN', '');
        abort_if(strlen($token) < 20 || !in_array($task, self::TASKS, true), 404);
        abort_unless(hash_equals($token, (string) $request->query('token', '')), 404);

        set_time_limit(0);
        $out = '';
        try {
            switch ($task) {
                case 'migrate':
                    Artisan::call('migrate', ['--force' => true]);
                    $out = Artisan::output();
                    break;
                case 'optimize-clear':
                    Artisan::call('optimize:clear');
                    $out = Artisan::output();
                    break;
                case 'images':
                    Artisan::call('images:optimize');
                    $out = Artisan::output();
                    break;
                case 'storage-link':
                    $out = $this->storageLink();
                    break;
            }
        } catch (\Throwable $e) {
            $out = 'FAILED: ' . $e->getMessage();
        }

        return response('[' . $task . "]\n" . trim($out) . "\n", 200, ['Content-Type' => 'text/plain; charset=UTF-8', 'Cache-Control' => 'no-store']);
    }

    /** Create public/storage -> storage/app/public, replacing a stale symlink but never a real folder. */
    private function storageLink(): string
    {
        $link = public_path('storage');
        $target = storage_path('app/public');
        if (is_link($link)) {
            if (realpath($link) === realpath($target)) {
                return 'Already linked correctly.';
            }
            @unlink($link); // stale or wrong link
        } elseif (file_exists($link)) {
            return 'public/storage exists as a real folder/file; not touched. Remove or rename it first.';
        }
        if (!function_exists('symlink')) {
            return 'symlink() is disabled on this host. Ask the host to enable it or create the link in cPanel.';
        }
        return @symlink($target, $link) ? 'Linked public/storage -> storage/app/public.' : 'symlink() failed (host restriction).';
    }
}
