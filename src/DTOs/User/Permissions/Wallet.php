<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class Wallet extends Permission
{
    public function __construct(
        public bool $accountTransfer,
        public bool $subMemberTransfer,
        public bool $subMemberTransferList,
        public bool $withdraw,
    ) {}
}
