<?php

namespace BybitApi\Exceptions;

use Error;
use Saloon\Http\Response;

class EndpointNotFoundException extends Error
{
    public function __construct(Response $response)
    {
        parent::__construct("Endpoint '{$response->getRequest()->resolveEndpoint()}' not found", 500);
    }
}