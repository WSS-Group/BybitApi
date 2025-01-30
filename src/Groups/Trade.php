<?php

namespace BybitApi\Groups;

use BybitApi\Exceptions\NotImplementedYetException;

class Trade extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/create-order
     */
    public function placeOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/amend-order
     */
    public function amendOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/cancel-order
     */
    public function cancelOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/open-order
     */
    public function getRealTimeOrders(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/cancel-all
     */
    public function cancelAllOrders(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/order-list
     */
    public function getOrderHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/execution
     */
    public function getTradeHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-place
     */
    public function batchPlaceOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-amend
     */
    public function batchAmendOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-cancel
     */
    public function batchCancelOrder(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/spot-borrow-quota
     */
    public function getBorrowQuota(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/dcp
     */
    public function setDisconnectCancelAll(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
