<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class Exchange extends Permission
{
    public function __construct(
        public bool $exchangeHistory,
    ) {}
}
