<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;
use BybitApi\DTOs\Market\InstrumentInfo\Option;
use BybitApi\DTOs\Market\InstrumentInfo\Spot;
use BybitApi\DTOs\Market\Ticker\LinearInverse as TickerLinearInverse;
use BybitApi\DTOs\Market\Ticker\Option as TickerOption;
use BybitApi\DTOs\Market\Ticker\Spot as TickerSpot;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\SymbolStatus;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetIndexPriceKline;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetInstrumentsInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetKline;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetMarkPriceKline;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetPremiumIndexPriceKline;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetTickers;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Market extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/time
     */
    public function getBybitServerTime(): Carbon
    {
        return $this->send(new GetBybitServerTime)->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Market\Kline>
     *
     * @link https://bybit-exchange.github.io/docs/v5/market/kline
     */
    public function getKline(
        BackedEnum|string $symbol,
        Interval $interval,
        ?Category $category = null,
        ?Carbon $start = null,
        ?Carbon $end = null,
        ?int $limit = null,
    ): Collection {
        return $this->send(new GetKline($symbol, $interval, $category, $start, $end, $limit))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Market\MarkIndexPriceKline>
     *
     * @link https://bybit-exchange.github.io/docs/v5/market/mark-kline
     */
    public function getMarkPriceKline(
        BackedEnum|string $symbol,
        Interval $interval,
        ?Category $category = null,
        ?Carbon $start = null,
        ?Carbon $end = null,
        ?int $limit = null,
    ): Collection {
        return $this->send(new GetMarkPriceKline($symbol, $interval, $category, $start, $end, $limit))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Market\MarkIndexPriceKline>
     *
     * @link https://bybit-exchange.github.io/docs/v5/market/index-kline
     */
    public function getIndexPriceKline(
        BackedEnum|string $symbol,
        Interval $interval,
        ?Category $category = null,
        ?Carbon $start = null,
        ?Carbon $end = null,
        ?int $limit = null,
    ): Collection {
        return $this->send(new GetIndexPriceKline($symbol, $interval, $category, $start, $end, $limit))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Market\MarkIndexPriceKline>
     *
     * @link https://bybit-exchange.github.io/docs/v5/market/premium-index-kline
     */
    public function getPremiumIndexPriceKline(
        BackedEnum|string $symbol,
        Interval $interval,
        ?Category $category = null,
        ?Carbon $start = null,
        ?Carbon $end = null,
        ?int $limit = null,
    ): Collection {
        return $this->send(new GetPremiumIndexPriceKline($symbol, $interval, $category, $start, $end, $limit))->dto();
    }

    /**
     * @return CursorCollection<string, LinearInverse|Option|Spot>|LinearInverse|Option|Spot
     *
     * @link https://bybit-exchange.github.io/docs/v5/market/instrument
     */
    public function getInstrumentsInfo(
        Category $category,
        null|BackedEnum|string $symbol = null,
        ?SymbolStatus $status = null,
        null|BackedEnum|string $baseCoin = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection|LinearInverse|Option|Spot {
        return $this->send(new GetInstrumentsInfo($category, $symbol, $status, $baseCoin, $limit, $cursor))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/orderbook
     */
    public function getOrderBook(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/tickers
     *
     * @return Collection<string, TickerLinearInverse|TickerOption|TickerSpot>|TickerLinearInverse|TickerOption|TickerSpot
     */
    public function getTickers(
        Category $category,
        BackedEnum|string|null $symbol = null,
        BackedEnum|string|null $baseCoin = null,
        ?string $expDate = null,
    ): Collection|TickerLinearInverse|TickerOption|TickerSpot {
        return $this->send(new GetTickers($category, $symbol, $baseCoin, $expDate))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/history-fund-rate
     */
    public function getFundingRateHistory(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/recent-trade
     */
    public function getPublicRecentTradingHistory(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/open-interest
     */
    public function getOpenInterest(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/iv
     */
    public function getHistoricalVolatility(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/insurance
     */
    public function getInsurance(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/risk-limit
     */
    public function getRiskLimit(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/delivery-price
     */
    public function getDeliveryPrice(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/long-short-ratio
     */
    public function getLongShortRatio(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
