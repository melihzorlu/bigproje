<?php

namespace App\Providers;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use App\Models\Blog;
use Illuminate\Support\Facades\View;

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
    public function boot()
    {
        App::setLocale('tr');
        Carbon::setLocale('tr');

        View::composer('*', function ($view) {
            $view->with('latestBlogs', Blog::latest()->take(3)->get());
        });
    }
}
