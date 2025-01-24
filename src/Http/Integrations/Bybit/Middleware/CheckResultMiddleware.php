<?php

namespace BybitApi\Http\Integrations\Bybit\Middleware;

use BybitApi\Exceptions\EndpointNotFoundException;
use BybitApi\Exceptions\UnexpectedResultOnResponseException;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use Saloon\Contracts\ResponseMiddleware;
use Saloon\Http\Response;

class CheckResultMiddleware implements ResponseMiddleware
{
    public function __invoke(Response $response): void
    {
        if ($response->status() === 404) {
            throw new EndpointNotFoundException($response);
        }
        $code = $response->json('retCode');
        $request = $response->getRequest();
        $bypassCodes = $request instanceof BypassCodes ? $request->bypassCodes() : [];
        if ($code !== 0 && ! in_array($code, $bypassCodes)) {
            throw new UnexpectedResultOnResponseException($response);
        }
    }
}
