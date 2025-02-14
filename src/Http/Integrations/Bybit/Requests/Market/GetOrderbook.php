<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Market\Orderbook;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/market/orderbook
 */
class GetOrderbook extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public ?int $limit = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/orderbook';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => $this->symbol,
            'limit' => Conditional::ifNotNull($this->limit),
        ]);
    }

    public function createDtoFromResponse(Response $response): Orderbook
    {
        return Orderbook::init($response->json('result'));
    }
}
