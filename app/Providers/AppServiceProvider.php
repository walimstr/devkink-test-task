<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
//        Validator::extend('valid_birth_date', function ($attribute, $value, $parameters, $validator){
//
//            $date_different = date_diff(new \DateTime($value), new \DateTime())->y;
//
//            return $date_different >= 18;
//        });
    }
}
