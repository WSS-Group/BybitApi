<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\DTOs\Trade\BatchAmendedOrder;
use BybitApi\DTOs\Trade\BatchCanceledOrder;
use BybitApi\DTOs\Trade\BatchPlacedOrder;
use BybitApi\DTOs\Trade\BorrowQuota;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\DTOs\Trade\Order;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\DTOs\Trade\TradeHistoryOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\ExecType;
use BybitApi\Enums\OrderFilter;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderStatus;
use BybitApi\Enums\Product;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\PlaceIntent;
use Illuminate\Support\Collection;

/**
 * @method PlacedOrder placeOrder(Category $category, PlaceIntent $order)
 * @method AmendedOrder amendOrder(Category $category, AmendIntent $order)
 * @method CanceledOrder cancelOrder(Category $category, CancelIntent $orderToCancel, ?OrderFilter $orderFilter = null)
 * @method null|CursorCollection<int, Order>|Order getRealTimeOrders(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?string $orderId = null, ?string $orderLinkId = null, ?bool $openOnly = null, ?OrderFilter $orderFilter = null, ?int $limit = null, ?string $cursor = null)
 * @method Collection<int, CanceledOrder> cancelAllOrders(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?OrderFilter $orderFilter = null, ?StopOrderType $stopOrderType = null)
 * @method null|CursorCollection<int, Order>|Order getOrderHistory(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?string $orderId = null, ?string $orderLinkId = null, ?OrderFilter $orderFilter = null, ?OrderStatus $orderStatus = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
 * @method null|CursorCollection<int, TradeHistoryOrder> getTradeHistory(Category $category, null|BackedEnum|string $symbol = null, ?string $orderId = null, ?string $orderLinkId = null, null|BackedEnum|string $baseCoin = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?ExecType $execType = null, ?int $limit = null, ?string $cursor = null)
 * @method Collection<int, BatchPlacedOrder> batchPlaceOrder(Category $category, PlaceIntent ...$orders)
 * @method Collection<int, BatchAmendedOrder> batchAmendOrder(Category $category, AmendIntent ...$orders)
 * @method Collection<int, BatchCanceledOrder> batchCancelOrder(Category $category, CancelIntent ...$orders)
 * @method bool setDisconnectCancelAll(int $timeWindow, ?Product $product = null)
 * @method BorrowQuota getBorrowQuota(Category $category, BackedEnum|string $symbol, OrderSide $side)
 *
 * @see \BybitApi\Groups\Trade
 */
class Trade extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Trade::class;
    }
}
