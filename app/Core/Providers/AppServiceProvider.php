<?php

namespace App\Core\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
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
        // We expect factories to be defined in a Factories folder alongside the model named as
        // {ModelName}Factory.php
        Factory::guessFactoryNamesUsing(function ($modelName) {
            $reflection = new \ReflectionClass($modelName);
            return sprintf(
                '%s\\Factories\\%sFactory',
                $reflection->getNamespaceName(),
                $reflection->getShortName(),
            );
        });

        Factory::guessModelNamesUsing(function ($factory) {
            return preg_replace('#^(.*)\\\Factories\\\(.*)Factory$#', '$1\\\$2', get_class($factory));
        });
    }
}
