<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class NFT extends Permission
{
    public function __construct(
        public bool $nftQueryProductList
    ) {}
}
