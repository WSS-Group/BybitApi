<?php

namespace BybitApi\DTOs\User\Permissions;

use Illuminate\Contracts\Support\Arrayable;

abstract readonly class Permission implements Arrayable
{
    public function toArray(): array
    {
        $class = new \ReflectionClass($this);
        $payload = [];
        foreach ($class->getProperties() as $property) {
            $payload[$property->getName()] = $this->{$property->getName()};
        }

        return $payload;
    }
}
