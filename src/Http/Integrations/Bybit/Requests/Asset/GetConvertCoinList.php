<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Asset\ConvertCoin;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ConvertSide;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/convert/convert-coin-list
 */
class GetConvertCoinList extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ConvertAccountType $accountType,
        public null|BackedEnum|string $coin = null,
        public ?ConvertSide $side = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/query-coin-list';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => 'eb_convert_funding',
            'coin' => Conditional::ifNotEmpty($this->coin),
            'side' => Conditional::ifNotNull($this->side),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.coins'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'coin') => ConvertCoin::init($data)]);
    }
}
