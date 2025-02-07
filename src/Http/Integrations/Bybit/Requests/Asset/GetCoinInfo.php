<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Asset\CoinInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/coin-info
 */
class GetCoinInfo extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public null|BackedEnum|string $coin = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/coin/query-info';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'coin' => Conditional::ifNotEmpty($this->coin),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.rows'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'coin') => CoinInfo::init($data)]);
    }
}
