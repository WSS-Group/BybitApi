<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\Order;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Enums\OrderStatus;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/order-list
 */
class GetOrderHistory extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public null|BackedEnum|string $symbol = null,
        public null|BackedEnum|string $baseCoin = null,
        public null|BackedEnum|string $settleCoin = null,
        public ?string $orderId = null,
        public ?string $orderLinkId = null,
        public ?OrderFilter $orderFilter = null,
        public ?OrderStatus $orderStatus = null,
        public ?Carbon $startTime = null,
        public ?Carbon $endTime = null,
        public ?int $limit = null,
        public ?string $cursor = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/history';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'settleCoin' => Conditional::ifNotEmpty($this->settleCoin),
            'orderId' => Conditional::ifNotEmpty($this->orderId),
            'orderLinkId' => Conditional::ifNotEmpty($this->orderLinkId),
            'orderFilter' => Conditional::ifNotNull($this->orderFilter),
            'orderStatus' => Conditional::ifNotNull($this->orderStatus),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): null|CursorCollection|Order
    {
        $cursor = $response->json('result.nextPageCursor');
        $cursor = ! empty($cursor) ? $cursor : null;

        $collection = new CursorCollection($response->json('result.list'))
            ->map(fn (array $data) => Order::init($data))
            ->setCursor($cursor);

        return ! empty($this->orderId) || ! empty($this->orderLinkId) ? $collection->first() : $collection;
    }
}
