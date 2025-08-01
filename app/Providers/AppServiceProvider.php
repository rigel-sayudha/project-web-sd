<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \View::composer('partial.footer', function ($view) {
            $beritaSekolah = \App\Models\Article::where('status', 'published')->orderBy('created_at', 'desc')->take(4)->get();
            $view->with('beritaSekolah', $beritaSekolah);
        });
    }
}
