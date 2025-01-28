<?php

namespace BybitApi\DTOs\Casts;

interface Castable
{
    public function __invoke(mixed $input): mixed;
}
