<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BybitApi\DTOs\Trade\BatchPlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Entity\Order;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/batch-place
 */
class BatchPlaceOrder extends Request implements HasBody
{
    use HasJsonBody;

    public Collection $orders;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        Order ...$orders,
    ) {
        $this->orders = collect($orders);
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/create-batch';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            'request' => $this->orders->toArray(),
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('retExtInfo.list'))
            ->map(fn (array $i, int $k) => BatchPlacedOrder::init($i + $response->json("result.list.$k", [])));
    }
}
