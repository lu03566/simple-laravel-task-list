<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
		/**
		 Set the default string length to 191 in the boot method of the AppServiceProvider to fix error below:
			
			SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))
		
		or $table->string('name', 191); // You can put any number in exchange of 191

		**/
		Schema::defaultStringLength(191);
        
    }
}
