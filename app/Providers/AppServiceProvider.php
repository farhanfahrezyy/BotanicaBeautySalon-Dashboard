<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        View::composer('pages.main.product.*', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
