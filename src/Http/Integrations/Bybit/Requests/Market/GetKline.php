<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Market\Kline;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/market/kline
 */
class GetKline extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public BackedEnum|string $symbol,
        public Interval $interval,
        public ?Category $category = null,
        public ?Carbon $start = null,
        public ?Carbon $end = null,
        public ?int $limit = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/kline';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'symbol' => $this->symbol,
            'interval' => $this->interval,
            'category' => Conditional::ifNotNull($this->category),
            'start' => Conditional::ifNotNull($this->start),
            'end' => Conditional::ifNotNull($this->end),
            'limit' => Conditional::ifNotNull($this->limit),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [intval(Arr::get($data, 0)) => Kline::init($data)]);
    }
}
