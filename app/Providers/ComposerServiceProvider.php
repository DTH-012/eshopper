<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer(
            'Menu.CatsBrands', 'App\Http\ViewComposers\CatsBrandsComposer@cat'
        );
        View::composer(
            'Product.Products', 'App\Http\ViewComposers\ProductsComposer@product'
        );
        // Using Closure based composers...

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}