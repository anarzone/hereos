<?php


namespace App\Providers;


use App\Category;
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
       $this->composeCategory();
       $this->composePage();
    }

    private function composeCategory(){
        View::composer('*', 'App\Http\View\Composers\CategoryComposer');
    }

    private function composePage(){
        View::composer('*', 'App\Http\View\Composers\PageComposer');
    }


}
