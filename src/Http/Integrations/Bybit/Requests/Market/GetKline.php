<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Kline;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

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

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/kline';
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [
                intval(Arr::get($data, 0)) => new Kline(
                    intval(Arr::get($data, 0)),
                    floatval(Arr::get($data, 1)),
                    floatval(Arr::get($data, 2)),
                    floatval(Arr::get($data, 3)),
                    floatval(Arr::get($data, 4)),
                    floatval(Arr::get($data, 5)),
                    floatval(Arr::get($data, 6)),
                ),
            ]);
    }
}
