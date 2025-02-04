<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\TradeHistoryOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\ExecType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/execution
 */
class GetTradeHistory extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public null|BackedEnum|string $symbol = null,
        public ?string $orderId = null,
        public ?string $orderLinkId = null,
        public null|BackedEnum|string $baseCoin = null,
        public ?Carbon $startTime = null,
        public ?Carbon $endTime = null,
        public ?ExecType $execType = null,
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
        return '/v5/execution/list';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'orderId' => Conditional::ifNotEmpty($this->orderId),
            'orderLinkId' => Conditional::ifNotEmpty($this->orderLinkId),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'execType' => Conditional::ifNotNull($this->execType),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): null|CursorCollection
    {
        $cursor = $response->json('result.nextPageCursor');
        $cursor = ! empty($cursor) ? $cursor : null;

        return new CursorCollection($response->json('result.list'))
            ->map(fn (array $data) => TradeHistoryOrder::init($data))
            ->setCursor($cursor);
    }
}
