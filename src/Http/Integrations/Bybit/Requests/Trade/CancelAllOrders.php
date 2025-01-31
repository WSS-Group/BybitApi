<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Enums\StopOrderType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/cancel-all
 */
class CancelAllOrders extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public null|BackedEnum|string $symbol = null,
        public null|BackedEnum|string $baseCoin = null,
        public null|BackedEnum|string $settleCoin = null,
        public ?OrderFilter $orderFilter = null,
        public ?StopOrderType $stopOrderType = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/cancel-all';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'settleCoin' => Conditional::ifNotEmpty($this->settleCoin),
            'orderFilter' => Conditional::ifNotNull($this->orderFilter),
            'stopOrderType' => Conditional::ifNotNull($this->stopOrderType),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->map(fn (array $data) => CanceledOrder::init($data));
    }
}
