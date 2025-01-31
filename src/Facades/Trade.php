<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Trade\BatchPlacedOrder;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Http\Integrations\Bybit\Entities\Order;
use BybitApi\Http\Integrations\Bybit\Entities\OrderToCancel;
use Illuminate\Support\Collection;

/**
 * @method PlacedOrder placeOrder(Category $category, Order $order)
 * @method CanceledOrder cancelOrder(Category $category, OrderToCancel $orderToCancel, ?OrderFilter $orderFilter = null)
 * @method Collection<int, CanceledOrder> cancelAllOrders(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?OrderFilter $orderFilter = null, ?StopOrderType $stopOrderType = null)
 * @method Collection<int, BatchPlacedOrder> batchPlaceOrder(Category $category, Order ...$orders)
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
