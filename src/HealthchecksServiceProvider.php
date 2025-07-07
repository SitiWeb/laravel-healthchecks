<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Support\ServiceProvider;

class HealthchecksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/healthchecks.php' => config_path('healthchecks.php'),
        ], 'config');
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/healthchecks.php',
            'healthchecks'
        );
    }
}
