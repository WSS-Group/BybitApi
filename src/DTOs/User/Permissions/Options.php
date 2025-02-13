<?php

namespace BybitApi\DTOs\User\Permissions;

readonly class Options extends Permission
{
    public function __construct(
        public bool $optionsTrade,
    ) {}
}
