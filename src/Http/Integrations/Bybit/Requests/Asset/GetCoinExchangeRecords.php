<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\CoinExchange;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/exchange
 */
class GetCoinExchangeRecords extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public null|BackedEnum|string $fromCoin = null,
        public null|BackedEnum|string $toCoin = null,
        public ?int $limit = null,
        public ?string $cursor = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/order-record';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'fromCoin' => Conditional::ifNotEmpty($this->fromCoin),
            'toCoin' => Conditional::ifNotNull($this->toCoin),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.orderBody'),
            CoinExchange::class,
            $response->json('result.nextPageCursor')
        );
    }
}
