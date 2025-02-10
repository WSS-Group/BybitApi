<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\Enums\AccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/transferable-coin
 */
class GetTransferableCoin extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public AccountType $fromAccountType,
        public AccountType $toAccountType,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/transfer/query-transfer-coin-list';
    }

    protected function defaultQuery(): array
    {
        return [
            'fromAccountType' => $this->fromAccountType,
            'toAccountType' => $this->toAccountType,
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'));
    }
}
