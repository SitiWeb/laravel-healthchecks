<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Healthchecks
{
    public static function ping(string $uuid, string $suffix = ''): void
    {
        $url = config('healthchecks.base_url') . $uuid . $suffix;

        if (config('app.debug') || config('app.env') !== 'production') {
            Log::info("[FAKE PING] {$url}");
            return;
        }
        Http::timeout(3)->get($url);
    }

    public static function pingStart(string $uuid): void
    {
        static::ping($uuid, '/start');
    }

    public static function pingFail(string $uuid): void
    {
        static::ping($uuid, '/fail');
    }

    public static function pingSuccess(string $uuid): void
    {
        static::ping($uuid);
    }

    public static function pingUrl(string $url): void
    {
        if (config('app.debug') || config('app.env') !== 'production') {
            Log::channel('healthchecks')->info("[FAKE PING] {$url}");
            return;
        }

        Http::timeout(3)->get($url);
    }
}
