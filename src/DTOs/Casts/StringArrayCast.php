<?php

namespace BybitApi\DTOs\Casts;

class StringArrayCast implements Castable
{
    public function __invoke(mixed $input): ?array
    {
        return is_array($input)
            ? array_map(fn (mixed $value) => strval($value), $input)
            : null;
    }
}
