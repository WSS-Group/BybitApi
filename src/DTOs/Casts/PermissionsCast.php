<?php

namespace BybitApi\DTOs\Casts;

use BybitApi\DTOs\User\Permissions\Permission;

readonly class PermissionsCast implements Castable
{
    /**
     * @param  class-string<\BybitApi\DTOs\User\Permissions\Permission>  $fnq
     */
    public function __construct(
        public string $fnq,
        public array $permissions,
    ) {}

    public function __invoke(mixed $input): Permission
    {
        $permissions = [];
        foreach ($this->permissions as $permission) {
            $permissions[] = in_array($permission, $input);
        }

        return new $this->fnq(...$permissions);
    }
}
