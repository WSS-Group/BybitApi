<?php

namespace BybitApi\DTOs\Casts;

use Illuminate\Support\Carbon;

class ParseDatetimeCast implements Castable
{
    public function __invoke(mixed $input): ?Carbon
    {
        return $input !== null && $input !== ''
            ? Carbon::parse($input)->setTimezone(config('app.timezone')) : null;
    }
}
