<?php

namespace SitiWeb\Healthchecks;

trait PingsHealthchecks
{
    public function handleWithHealthcheck(string $uuid, callable $callback): int
    {
        Healthchecks::pingStart($uuid);

        try {
            $result = $callback();
            Healthchecks::pingSuccess($uuid);
            return $result ?? 0;
        } catch (\Throwable $e) {
            Healthchecks::pingFail($uuid);
            throw $e;
        }
    }
}
