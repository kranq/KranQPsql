<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('phone_number', function($attribute, $value, $parameters)
        {
            //$str = "9703132428,123456789,1";
            // convert string to array         
            $numbers = explode(',', $value);
            // remove empty items from array
            $numbers = array_filter($numbers);
            // trim all the items in array 
            $numbers =array_map('trim', $numbers);
            
            // default error count
            $error = 0;
            // array to store invalid numbers
            $inValidNumbers = array();
         
            // loop through all the numbers in array  
            foreach($numbers as $number) {
              // number validation we allow only 0 to 9 , min 5 max 14 number only
                if(!preg_match("/^[0-9,+ -()]{5,14}$/", $number)) {
                      $error++; // increment error count
                      // push the invalid numbers into array
                      array_push($inValidNumbers,$number); 
         
                }
            }
         
            if($error != 0) { 
                return false;
            } else {
                return true;
            }

            //return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
            //return substr($value, 0, 2) == '01';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Appzcoder\CrudGenerator\CrudGeneratorServiceProvider');
        }
    }
}
