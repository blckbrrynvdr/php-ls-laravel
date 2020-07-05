<?php

namespace App\Http\View\Composers;

use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $user = Auth::user();

        // Using Closure based composers...
        View::composer('layouts.sidebar.categories', function (\Illuminate\View\View $view) {
            $view->with('categories', Category::all());
        });

        // Using Closure based composers...
//        View::composer('*', function (\Illuminate\View\View $view) use ($user) {
//            $view->with('is_admin', $user && $user->isAdmin());
//        });
    }
}