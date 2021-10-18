<?php

namespace App\Providers;


use App\model\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->TopMenu();
    }

    public function TopMenu()
    {
        View::composer('riode.topmenu.main', function($view){
            $view->with('categories', Category::with('children')->where('parent_id', 0)->get());
        });
    }
}
