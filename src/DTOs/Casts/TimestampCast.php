<?php

namespace BybitApi\DTOs\Casts;

use Illuminate\Support\Carbon;

class TimestampCast implements Castable
{
    public function __invoke(mixed $input): ?Carbon
    {
        return $input !== null && $input !== ''
            ? Carbon::createFromTimestampMs($input)->setTimezone(config('app.timezone')) : null;
    }
}
