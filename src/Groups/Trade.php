<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Entities\Order;
use BybitApi\Http\Integrations\Bybit\Entities\OrderToCancel;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchCancelOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchPlaceOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelAllOrders;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\PlaceOrder;
use Illuminate\Support\Collection;

class Trade extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/create-order
     */
    public function placeOrder(Category $category, Order $order): PlacedOrder
    {
        return $this->connector()->send(new PlaceOrder($category, $order))->dto();
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
    public function cancelOrder(
        Category $category,
        OrderToCancel $orderToCancel,
        ?OrderFilter $orderFilter = null
    ): CanceledOrder {
        return $this->connector()
            ->send(new CancelOrder($category, $orderToCancel, $orderFilter))
            ->dto();
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
    public function cancelAllOrders(
        Category $category,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $baseCoin = null,
        null|BackedEnum|string $settleCoin = null,
        ?OrderFilter $orderFilter = null,
        ?StopOrderType $stopOrderType = null,
    ): Collection {
        return $this->connector()
            ->send(new CancelAllOrders($category, $symbol, $baseCoin, $settleCoin, $orderFilter, $stopOrderType))
            ->dto();
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
     * @return Collection<int, \BybitApi\DTOs\Trade\BatchPlacedOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-place
     */
    public function batchPlaceOrder(Category $category, Order ...$orders): Collection
    {
        return $this->connector()->send(new BatchPlaceOrder($category, ...$orders))->dto();
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
     * @return Collection<int, \BybitApi\DTOs\Trade\BatchCanceledOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-cancel
     */
    public function batchCancelOrder(Category $category, OrderToCancel ...$orders): Collection
    {
        return $this->connector()->send(new BatchCancelOrder($category, ...$orders))->dto();
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
