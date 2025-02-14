<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Account\CoinGreek;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/coin-greeks
 */
class GetCoinGreeks extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public null|BackedEnum|string $baseCoin = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/coin-greeks';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'baseCoin') => CoinGreek::init($data)]);
    }
}
