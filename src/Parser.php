<?php

namespace BybitApi;

use BackedEnum;
use Illuminate\Support\Arr;

class Parser
{
    public static function enumIfNotEmpty(array $array, string|int $key, string $fqn, ?BackedEnum $fallback = null): ?BackedEnum
    {
        $value = Arr::get($array, $key);
        if ($value !== null && $value !== '') {
            return $fqn::tryFrom($value) ?? $fallback;
        }
        return null;
    }

    public static function floatIfNotEmpty(array $array, string|int $key): ?float
    {
        $value = Arr::get($array, $key);
        if ($value !== null && $value !== '') {
            return floatval($value);
        }
        return null;
    }

    public static function intIfNotEmpty(array $array, string|int $key): ?int
    {
        $value = Arr::get($array, $key);
        if ($value !== null && $value !== '') {
            return intval($value);
        }
        return null;
    }
}