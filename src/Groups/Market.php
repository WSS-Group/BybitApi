<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\DTOs\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetKline;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetTickers;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class Market extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/time
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getBybitServerTime(): Carbon
    {
        return $this->connector()
            ->send(new GetBybitServerTime()->setCache($this->cacheTTL()))
            ->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/kline
     *
     * @return Collection<int, \BybitApi\DTOs\Kline>
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getKline(
        BackedEnum|string $symbol,
        Interval $interval,
        ?Category $category = null,
        ?Carbon $start = null,
        ?Carbon $end = null,
        ?int $limit = null,
    ): Collection {
        return $this->connector()
            ->send(new GetKline($symbol, $interval, $category, $start, $end, $limit)->setCache($this->cacheTTL()))
            ->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/mark-kline
     */
    public function getMarkPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/index-kline
     */
    public function getIndexPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/premium-index-kline
     */
    public function getPremiumIndexPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/instrument
     */
    public function getInstrumentsInfo(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/orderbook
     */
    public function getOrderBook(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/tickers
     *
     * @return Collection<string, \BybitApi\DTOs\Ticker>|\BybitApi\DTOs\Ticker
     *
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getTickers(
        Category $category,
        BackedEnum|string|null $symbol = null,
        BackedEnum|string|null $baseCoin = null,
        ?string $expDate = null,
    ): Collection|Ticker {
        return $this->connector()
            ->send(new GetTickers($category, $symbol, $baseCoin, $expDate)->setCache($this->cacheTTL()))
            ->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/history-fund-rate
     */
    public function getFundingRateHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/recent-trade
     */
    public function getPublicRecentTradingHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/open-interest
     */
    public function getOpenInterest(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/iv
     */
    public function getHistoricalVolatility(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/insurance
     */
    public function getInsurance(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/risk-limit
     */
    public function getRiskLimit(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/delivery-price
     */
    public function getDeliveryPrice(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/long-short-ratio
     */
    public function getLongShortRatio(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
