<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class CopyTrading extends Permission
{
    public function __construct(
        public bool $contractTrade
    ) {}
}
