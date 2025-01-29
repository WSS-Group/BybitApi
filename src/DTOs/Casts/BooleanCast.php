<?php

namespace BybitApi\DTOs\Casts;

class BooleanCast implements Castable
{
    public function __invoke(mixed $input): ?bool
    {
        return $input !== null && $input !== ''
            ? filter_var($input, FILTER_VALIDATE_BOOLEAN)
            : null;
    }
}
