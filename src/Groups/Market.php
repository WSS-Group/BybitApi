<?php

namespace BybitApi\Groups;

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use Illuminate\Support\Carbon;

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
        return $this->connector()->send(new GetBybitServerTime)->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/kline
     */
    public function getKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
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
     */
    public function getTickers(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
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
