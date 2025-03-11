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
        $contentType = str($response->header('Content-Type') ?? '');
        $psrResponse = $response->getPsrResponse();
        if ($contentType->lower()->contains('application/json')) {
            $code = $response->json('retCode') ?? $response->status();
            $msg = $response->json('retMsg') ?? $psrResponse->getReasonPhrase() ?? $response->body();
        } else {
            $code = $response->status();
            $msg = $psrResponse->getReasonPhrase() ?? $response->body();
        }
        $request = $response->getRequest();
        $bypassCodes = $request instanceof BypassCodes ? $request->bypassCodes() : [];
        if (! in_array($code, [0, 200]) && ! in_array($code, $bypassCodes)) {
            throw new UnexpectedResultOnResponseException($response, $code, $msg);
        }
    }
}
