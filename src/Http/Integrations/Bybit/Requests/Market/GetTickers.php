<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Market\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class GetTickers extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public BackedEnum|string|null $symbol = null,
        public BackedEnum|string|null $baseCoin = null,
        public ?string $expDate = null,
    ) {

        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/tickers';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotNull($this->symbol),
            'baseCoin' => Conditional::ifNotNull($this->baseCoin),
            'expDate' => Conditional::ifNotNull($this->expDate),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection|Ticker
    {
        $collection = collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'symbol') => Ticker::init($data)]);

        return ! empty($this->symbol) ? $collection->first() : $collection;
    }
}
