<?php

namespace BybitApi\Attributes;

use Attribute;
use BybitApi\Exceptions\AtLeastOneParameterRequiredException;
use BybitApi\Http\Integrations\Bybit\Requests\Request;

#[Attribute]
class AtLeastOneParameterRequired
{

    public array $parameters;

    public function __construct(string ... $parameters)
    {
        $this->parameters = $parameters;
    }

    public function __invoke(Request $request): void
    {
        $missing = true;
        foreach ($this->parameters as $parameter) {
            if (property_exists($request, $parameter) && $request->{$parameter} !== null) {
                $missing = false;
                break;
            }
        }

        throw_if($missing, AtLeastOneParameterRequiredException::class, $request, $this->parameters);
    }
}