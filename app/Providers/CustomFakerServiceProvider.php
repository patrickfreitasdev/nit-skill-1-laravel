<?php

namespace App\Providers;

use Faker\Generator as FakerGenerator;
use Illuminate\Support\ServiceProvider;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;

class CustomFakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FakerGenerator::class, function ($app) {
            $faker = \Faker\Factory::create();
            $faker->addProvider(new FakerPicsumImagesProvider($faker));

            return $faker;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
