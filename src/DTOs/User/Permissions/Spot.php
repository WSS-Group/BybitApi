<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class Spot extends Permission
{
    public function __construct(
        public bool $spotTrade,
    ) {}
}
