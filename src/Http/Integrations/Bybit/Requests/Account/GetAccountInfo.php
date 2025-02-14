<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/account-info
 */
class GetAccountInfo extends Request
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
        return '/v5/account/info';
    }

    public function createDtoFromResponse(Response $response): AccountInfo
    {
        return AccountInfo::init($response->json('result'));
    }
}
