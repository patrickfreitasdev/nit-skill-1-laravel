<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Add custom Australian phone validation rule
        Validator::extend('phone', function ($attribute, $value, $parameters, $validator) {
            // Remove any non-digit characters
            $cleaned = preg_replace('/[^\d]/', '', $value);

            // Australian mobile numbers: 04XX XXX XXX (10 digits)
            // Australian landline: 0X XXXX XXXX (10 digits)
            // With country code: +61 4XX XXX XXX or +61 X XXXX XXXX

            // Check if it's a valid Australian number
            if (strlen($cleaned) === 10) {
                // Local format (starts with 0)
                return $cleaned[0] === '0';
            } elseif (strlen($cleaned) === 11) {
                // International format (starts with 61)
                return substr($cleaned, 0, 2) === '61';
            }

            return false;
        });
    }
}
