<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\CurAuctionPhase;
use BybitApi\Parser;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
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

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotNull($this->symbol),
            'baseCoin' => Conditional::ifNotNull($this->baseCoin),
            'expDate' => Conditional::ifNotNull($this->expDate),
        ]);
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/market/tickers';
    }

    public function createDtoFromResponse(Response $response): Collection|Ticker
    {
        $collection = collect($response->json('result.list'))
            ->mapWithKeys(fn(array $data) => [
                Arr::get($data, 'symbol') => new Ticker(
                    Arr::get($data, 'symbol'),
                    Parser::floatIfNotEmpty($data, 'lastPrice'),
                    Parser::floatIfNotEmpty($data, 'indexPrice'),
                    Parser::floatIfNotEmpty($data, 'markPrice'),
                    Parser::floatIfNotEmpty($data, 'prevPrice24h'),
                    Parser::floatIfNotEmpty($data, 'price24hPcnt'),
                    Parser::floatIfNotEmpty($data, 'highPrice24h'),
                    Parser::floatIfNotEmpty($data, 'lowPrice24h'),
                    Parser::floatIfNotEmpty($data, 'prevPrice1h'),
                    Parser::floatIfNotEmpty($data, 'openInterest'),
                    Parser::floatIfNotEmpty($data, 'openInterestValue'),
                    Parser::floatIfNotEmpty($data, 'turnover24h'),
                    Parser::floatIfNotEmpty($data, 'volume24h'),
                    Parser::floatIfNotEmpty($data, 'fundingRate'),
                    Parser::intIfNotEmpty($data, 'nextFundingTime'),
                    Parser::floatIfNotEmpty($data, 'predictedDeliveryPrice'),
                    Parser::floatIfNotEmpty($data, 'basisRate'),
                    Parser::floatIfNotEmpty($data, 'basis'),
                    Parser::floatIfNotEmpty($data, 'deliveryFeeRate'),
                    Parser::intIfNotEmpty($data, 'deliveryTime'),
                    Parser::floatIfNotEmpty($data, 'ask1Size'),
                    Parser::floatIfNotEmpty($data, 'bid1Price'),
                    Parser::floatIfNotEmpty($data, 'ask1Price'),
                    Parser::floatIfNotEmpty($data, 'bid1Size'),
                    Parser::floatIfNotEmpty($data, 'preOpenPrice'),
                    Parser::floatIfNotEmpty($data, 'preQty'),
                    Parser::enumIfNotEmpty($data, 'curPreListingPhase', CurAuctionPhase::class, CurAuctionPhase::OTHER),
                ),
            ]);
        return !empty($this->symbol) ? $collection->first() : $collection;
    }
}
