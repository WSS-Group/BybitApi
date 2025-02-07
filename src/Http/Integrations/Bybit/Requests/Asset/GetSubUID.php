<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\DTOs\Asset\SubUID;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/sub-uid-list
 */
class GetSubUID extends Request
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
        return '/v5/asset/transfer/query-sub-member-list';
    }

    public function createDtoFromResponse(Response $response): SubUID
    {
        return SubUID::init($response->json('result'));
    }
}
