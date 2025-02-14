<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/smp-group
 */
class GetSmpGroupId extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/smp-group';
    }

    public function createDtoFromResponse(Response $response): int
    {
        return $response->json('result.smpGroup');
    }
}
