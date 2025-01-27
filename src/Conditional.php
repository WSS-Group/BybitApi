<?php

namespace BybitApi;

class Conditional
{
    public static function array(array $data): array
    {
        return collect($data)
            ->filter(fn(mixed $value) => !$value instanceof self)
            ->toArray();
    }

    public static function ifNotNull(mixed $data): mixed
    {
        return $data !== null ? $data : new Conditional();
    }

    public static function ifNotEmpty(mixed $data): mixed
    {
        return !empty($data) ? $data : new Conditional();
    }
}