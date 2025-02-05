<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\DTOs\Trade\BorrowQuota;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\DTOs\Trade\Order;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\DTOs\Trade\TradeHistoryOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\ExecType;
use BybitApi\Enums\OrderFilter;
use BybitApi\Enums\OrderStatus;
use BybitApi\Enums\Product;
use BybitApi\Enums\Side;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\PlaceIntent;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\AmendOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchAmendOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchCancelOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchPlaceOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelAllOrders;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\CancelOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetBorrowQuota;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetOrderHistory;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetRealTimeOrders;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetTradeHistory;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\PlaceOrder;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\SetDisconnectCancelAll;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class Trade extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/create-order
     */
    public function placeOrder(Category $category, PlaceIntent $order): PlacedOrder
    {
        return $this->send(new PlaceOrder($category, $order))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/amend-order
     */
    public function amendOrder(Category $category, AmendIntent $order): AmendedOrder
    {
        return $this->send(new AmendOrder($category, $order))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/cancel-order
     */
    public function cancelOrder(
        Category $category,
        CancelIntent $orderToCancel,
        ?OrderFilter $orderFilter = null
    ): CanceledOrder {
        return $this->send(new CancelOrder($category, $orderToCancel, $orderFilter))->dto();
    }

    /**
     * @return null|CursorCollection<int, \BybitApi\DTOs\Trade\Order>|Order
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/open-order
     */
    public function getRealTimeOrders(
        Category $category,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $baseCoin = null,
        null|BackedEnum|string $settleCoin = null,
        ?string $orderId = null,
        ?string $orderLinkId = null,
        ?bool $openOnly = null,
        ?OrderFilter $orderFilter = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): null|CursorCollection|Order {
        return $this->send(new GetRealTimeOrders(
            $category, $symbol, $baseCoin, $settleCoin, $orderId, $orderLinkId,
            $openOnly, $orderFilter, $limit, $cursor
        ))
            ->dto();
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
        return $this->send(new CancelAllOrders($category, $symbol, $baseCoin, $settleCoin, $orderFilter, $stopOrderType))
            ->dto();
    }

    /**
     * @return null|CursorCollection<int, \BybitApi\DTOs\Trade\Order>|Order
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/order-list
     */
    public function getOrderHistory(
        Category $category,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $baseCoin = null,
        null|BackedEnum|string $settleCoin = null,
        ?string $orderId = null,
        ?string $orderLinkId = null,
        ?OrderFilter $orderFilter = null,
        ?OrderStatus $orderStatus = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): null|CursorCollection|Order {
        return $this->send(new GetOrderHistory(
            $category, $symbol, $baseCoin, $settleCoin, $orderId, $orderLinkId,
            $orderFilter, $orderStatus, $startTime, $endTime, $limit, $cursor
        ))
            ->dto();
    }

    /**
     * @return null|CursorCollection<int, TradeHistoryOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/execution
     */
    public function getTradeHistory(
        Category $category,
        null|BackedEnum|string $symbol = null,
        ?string $orderId = null,
        ?string $orderLinkId = null,
        null|BackedEnum|string $baseCoin = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?ExecType $execType = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): ?CursorCollection {
        return $this->send(new GetTradeHistory(
            $category, $symbol, $orderId, $orderLinkId, $baseCoin,
            $startTime, $endTime, $execType, $limit, $cursor
        ))
            ->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Trade\BatchPlacedOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-place
     */
    public function batchPlaceOrder(Category $category, PlaceIntent ...$orders): Collection
    {
        return $this->send(new BatchPlaceOrder($category, ...$orders))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Trade\BatchAmendedOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-amend
     */
    public function batchAmendOrder(Category $category, AmendIntent ...$orders): Collection
    {
        return $this->send(new BatchAmendOrder($category, ...$orders))->dto();
    }

    /**
     * @return Collection<int, \BybitApi\DTOs\Trade\BatchCanceledOrder>
     *
     * @link https://bybit-exchange.github.io/docs/v5/order/batch-cancel
     */
    public function batchCancelOrder(Category $category, CancelIntent ...$orders): Collection
    {
        return $this->send(new BatchCancelOrder($category, ...$orders))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/spot-borrow-quota
     */
    public function getBorrowQuota(Category $category, BackedEnum|string $symbol, Side $side): BorrowQuota
    {
        return $this->send(new GetBorrowQuota($category, $symbol, $side))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/order/dcp
     */
    public function setDisconnectCancelAll(int $timeWindow, ?Product $product = null): bool
    {
        return $this->send(new SetDisconnectCancelAll($timeWindow, $product))->dto();
    }
}
