<?php

namespace BybitApi\Groups;

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use Illuminate\Support\Carbon;

class Market extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/time
     * @return Carbon
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function getBybitServerTime(): Carbon
    {
        return $this->connector()->send(new GetBybitServerTime())->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/kline
     * @return mixed
     */
    public function getKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/mark-kline
     * @return mixed
     */
    public function getMarkPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/index-kline
     * @return mixed
     */
    public function getIndexPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/premium-index-kline
     * @return mixed
     */
    public function getPremiumIndexPriceKline(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/instrument
     * @return mixed
     */
    public function getInstrumentsInfo(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/orderbook
     * @return mixed
     */
    public function getOrderBook(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/tickers
     * @return mixed
     */
    public function getTickers(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/history-fund-rate
     * @return mixed
     */
    public function getFundingRateHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/recent-trade
     * @return mixed
     */
    public function getPublicRecentTradingHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/open-interest
     * @return mixed
     */
    public function getOpenInterest(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/iv
     * @return mixed
     */
    public function getHistoricalVolatility(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/insurance
     * @return mixed
     */
    public function getInsurance(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/risk-limit
     * @return mixed
     */
    public function getRiskLimit(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/delivery-price
     * @return mixed
     */
    public function getDeliveryPrice(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/market/long-short-ratio
     * @return mixed
     */
    public function getLongShortRatio(): mixed
    {
        // TODO
        throw new NotImplementedYetException();
    }
}