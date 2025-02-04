<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BybitApi\Conditional;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/cancel-order
 */
class CancelOrder extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public CancelIntent $orderToCancel,
        public ?OrderFilter $orderFilter = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/cancel';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            ...$this->orderToCancel->toArray(),
            'orderFilter' => Conditional::ifNotNull($this->orderFilter),
        ]);
    }

    public function createDtoFromResponse(Response $response): CanceledOrder
    {
        return CanceledOrder::init($response->json('result'));
    }
}
