<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;
use BybitApi\DTOs\Market\InstrumentInfo\Option;
use BybitApi\DTOs\Market\InstrumentInfo\Spot;
use BybitApi\DTOs\Market\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\SymbolStatus;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

class GetInstrumentsInfo extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public null|BackedEnum|string $symbol = null,
        public null|SymbolStatus $status = null,
        public null|BackedEnum|string $baseCoin = null,
        public null|int $limit = null,
        public null|string $cursor = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/instruments-info';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'status' => Conditional::ifNotEmpty($this->status),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'limit' => Conditional::ifNotEmpty($this->limit),
            'cursor' => Conditional::ifNotEmpty($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection|LinearInverse|Option|Spot
    {
        $category = Category::from($response->json('result.category'));

        $collection = collect($response->json('result.list'))
            ->mapWithKeys(fn(array $data) => [
                Arr::get($data, 'symbol') => match ($category) {
                    Category::INVERSE, Category::LINEAR => LinearInverse::init($data),
                    Category::OPTION => Option::init($data),
                    Category::SPOT => Spot::init($data),
                }
            ]);

        return !empty($this->symbol) ? $collection->first() : $collection;
    }
}
