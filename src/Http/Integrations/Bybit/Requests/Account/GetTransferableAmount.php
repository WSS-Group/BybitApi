<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/unified-trans-amnt
 */
class GetTransferableAmount extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public BackedEnum|string $coinName,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/withdrawal';
    }

    protected function defaultQuery(): array
    {
        return [
            'coinName' => $this->coinName,
        ];
    }

    public function createDtoFromResponse(Response $response): float
    {
        return $response->json('result.availableWithdrawal');
    }
}
