<?php

namespace SitiWeb\Healthchecks;

use Illuminate\Support\Facades\Http;

class Healthchecks
{
    public static function ping(string $uuid, string $suffix = ''): void
    {
        $url = config('healthchecks.base_url') . $uuid . $suffix;
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
}
