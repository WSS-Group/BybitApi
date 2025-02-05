<?php

namespace BybitApi\Exceptions;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Error;
use Illuminate\Support\Arr;

class AtLeastOneParameterRequiredException extends Error
{
    public function __construct(Request $request, array $attributes)
    {
        $attributes = collect($attributes)
            ->map(fn(string $value) => "'$value'")
            ->toArray();
        $message = sprintf(
            "On request '%s' %s must be filled.",
            $request::class,
            Arr::join($attributes, ', ', ' or '),
        );
        parent::__construct($message, 500);
    }
}
