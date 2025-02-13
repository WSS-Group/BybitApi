<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\DTOs\User\ApiKey;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/apikey-info
 */
class GetApiKeyInformation extends Request
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
        return '/v5/user/query-api';
    }

    public function createDtoFromResponse(Response $response): ApiKey
    {
        return ApiKey::init($response->json('result'));
    }
}
