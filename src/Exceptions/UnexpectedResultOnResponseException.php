<?php

namespace BybitApi\Exceptions;

use Error;
use Saloon\Http\Response;

class UnexpectedResultOnResponseException extends Error
{
    public function __construct(Response $response)
    {
        $code = $response->json('retCode');
        $msg = $response->json('retMsg');
        parent::__construct("Unexpected resulto on response. Code: $code; Message: $msg", 500);
    }
}