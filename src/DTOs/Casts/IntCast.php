<?php

namespace BybitApi\DTOs\Casts;

class IntCast implements Castable
{

    public function __invoke(mixed $input): ?int
    {
        return $input !== null && $input !== '' ? intval($input) : null;
    }
}