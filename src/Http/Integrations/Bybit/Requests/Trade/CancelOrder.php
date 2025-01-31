<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
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
        public BackedEnum|string $symbol,
        public ?string $orderId = null,
        public ?string $orderLinkId = null,
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
            'symbol' => $this->symbol,
            'orderId' => Conditional::ifNotEmpty($this->orderId),
            'orderLinkId' => Conditional::ifNotEmpty($this->orderLinkId),
            'orderFilter' => Conditional::ifNotNull($this->orderFilter),
        ]);
    }

    public function createDtoFromResponse(Response $response): CanceledOrder
    {
        return CanceledOrder::init($response->json('result'));
    }
}
