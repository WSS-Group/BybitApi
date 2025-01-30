<?php

namespace BybitApi\DTOs\Casts;

class StringCast implements Castable
{
    public function __invoke(mixed $input): ?string
    {
        return $input !== null && $input !== '' ? strval($input) : null;
    }
}
