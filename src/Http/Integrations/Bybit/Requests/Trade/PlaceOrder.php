<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Entity\Order;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/create-order
 */
class PlaceOrder extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public Order $order,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/create';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            ...$this->order->toArray(),
        ];
    }

    public function createDtoFromResponse(Response $response): PlacedOrder
    {
        return PlacedOrder::init($response->json('result'));
    }
}
