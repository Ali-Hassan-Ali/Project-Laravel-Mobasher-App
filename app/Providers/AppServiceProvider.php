<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
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
        Schema::defaultStringLength(191);

        ResponseFactory::macro('api', function ($data = null, $error = 0, $message = '') {
            return response()->json([
                'data'    => $data,
                'error'   => $error, //1 or 0
                'message' => $message,
            ]);
        });

    }//end of boot

}//end of class
