<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class ContractTrade extends Permission
{
    public function __construct(
        public bool $order,
        public bool $position,
    ) {}
}
