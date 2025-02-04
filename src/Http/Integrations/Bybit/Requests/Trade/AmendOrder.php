<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/amend-order
 */
class AmendOrder extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public AmendIntent $order,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/amend';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            ...$this->order->toArray(),
        ];
    }

    public function createDtoFromResponse(Response $response): AmendedOrder
    {
        return AmendedOrder::init($response->json('result'));
    }
}
