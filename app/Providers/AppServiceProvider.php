<?php

namespace App\Providers;
use View;
use App\Category;
use DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       //View::share('name','gfyguyg');
       View::composer('layouts.inc.menu',function($view){

        $publishedCategories = DB::table('categories')->where('publicationStatus',1)->get();
        $view->with('publishedCategories',$publishedCategories);
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
