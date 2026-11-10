<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        class_alias(\App\Support\Img::class, 'Img'); // short alias for Blade views
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Presentation-only data derived from existing Voyager settings, shared with the public layout.
        View::composer(['layouts.default', 'includes.*', 'pages.*'], function ($view) {
            if (isset($view->getData()['site'])) {
                return;
            }
            preg_match_all('/\+?\d[\d\s\-()]{7,}\d/', (string) setting('site.phone'), $m);
            $phones = array_values(array_unique(array_map('trim', $m[0] ?? [])));
            $social = [];
            foreach (['facebook', 'twitter', 'instagram'] as $net) {
                $url = trim((string) setting('site.' . $net));
                $path = trim((string) parse_url($url, PHP_URL_PATH), '/');
                if ($url !== '' && $path !== '') { // bare domains are placeholders, hide them
                    $social[$net] = $url;
                }
            }
            preg_match('/\d+/', strip_tags((string) setting('site.experience')), $exp);
            $view->with('site', [
                'phones' => $phones,
                'email' => setting('site.email'),
                'address' => setting('site.footer_contact'),
                'social' => $social,
                'years' => $exp[0] ?? null,
            ]);
        });
    }
}
