<?php

namespace App\Providers;

use Validator;
use App\DoubleGoogleOrderModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
        // Schema::defaultStringLength(20);

        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
            $min_field = $parameters[0];
            $data = $validator->getData();
            $min_value = $data[$min_field];
            return $value > $min_value;
          });
      
          Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
            // dd($message, $attribute, $rule, $parameters);
            return str_replace(':field', $parameters[0], $message);
          });

          Validator::extend('not_exists', function($attribute, $value, $parameters) {
              return \DB::table($parameters[0])
              ->where($parameters[1], '=', $value)
              ->count() > 0;
          });

          \App\DoubleGoogleOrderModel::creating(function ($model) {
              $model->order_number = 10000+(DoubleGoogleOrderModel::latest()->value('id') + 1);
            //   $model->save();
          });
    }
}
