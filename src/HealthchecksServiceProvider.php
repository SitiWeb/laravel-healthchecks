<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Support\ServiceProvider;

class HealthchecksServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/healthchecks.php' => config_path('healthchecks.php'),
            __DIR__ . '/../config/healthchecks-logging.php' => config_path('healthchecks-logging.php'),
        ], 'config');

        // Merge de extra logging channel onder een eigen key
        $this->mergeConfigFrom(
            __DIR__ . '/../config/healthchecks-logging.php',
            'logging.channels'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/healthchecks.php',
            'healthchecks'
        );
    }
}
