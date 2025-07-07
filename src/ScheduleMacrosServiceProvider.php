<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\ServiceProvider;
use SitiWeb\Healthchecks\Healthchecks;

class ScheduleMacrosServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::macro('healthchecks', function (string $uuid) {
            /** @var Event $this */

            $this->before(function () use ($uuid) {
                Healthchecks::pingStart($uuid);
            });

            $this->after(function () use ($uuid) {
                Healthchecks::pingSuccess($uuid);
            });

            $this->onFailure(function () use ($uuid) {
                Healthchecks::pingFail($uuid);
            });

            return $this;
        });
    }
}
