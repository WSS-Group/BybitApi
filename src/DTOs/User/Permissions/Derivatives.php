<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class Derivatives extends Permission
{
    public function __construct(
        public bool $derivativesTrade,
    ) {}
}
