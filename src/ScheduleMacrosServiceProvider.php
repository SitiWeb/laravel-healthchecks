<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\ServiceProvider;

class ScheduleMacrosServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::macro('healthchecks', function (string $slug) {
            /** @var Event $this */

            $base = rtrim(config('healthchecks.base_url'), '/');
            $key = config('healthchecks.ping_key');

            if (!$key) {
                throw new \RuntimeException('Missing Healthchecks ping key (set HEALTHCHECKS_PING_KEY in .env)');
            }

            $url = "{$base}/ping/{$key}/{$slug}";

            $this->before(function () use ($url) {
                Healthchecks::pingUrl("{$url}/start");
            });

            $this->after(function () use ($url) {
                Healthchecks::pingUrl($url);
            });

            $this->onFailure(function () use ($url) {
                Healthchecks::pingUrl("{$url}/fail");
            });

            return $this;
        });
    }
}
