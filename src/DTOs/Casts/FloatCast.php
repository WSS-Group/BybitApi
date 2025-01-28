<?php

namespace BybitApi\DTOs\Casts;

class FloatCast implements Castable
{
    public function __invoke(mixed $input): ?float
    {
        return $input !== null && $input !== '' ? floatval($input) : null;
    }
}
