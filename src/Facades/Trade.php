<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\DTOs\Trade\BatchAmendedOrder;
use BybitApi\DTOs\Trade\BatchCanceledOrder;
use BybitApi\DTOs\Trade\BatchPlacedOrder;
use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderFilter;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\AmendIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\CancelIntent;
use BybitApi\Http\Integrations\Bybit\Entities\Orders\PlaceIntent;
use Illuminate\Support\Collection;

/**
 * @method PlacedOrder placeOrder(Category $category, PlaceIntent $order)
 * @method AmendedOrder amendOrder(Category $category, AmendIntent $order)
 * @method CanceledOrder cancelOrder(Category $category, CancelIntent $orderToCancel, ?OrderFilter $orderFilter = null)
 * @method Collection<int, CanceledOrder> cancelAllOrders(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?OrderFilter $orderFilter = null, ?StopOrderType $stopOrderType = null)
 * @method Collection<int, BatchPlacedOrder> batchPlaceOrder(Category $category, PlaceIntent ...$orders)
 * @method Collection<int, BatchAmendedOrder> batchAmendOrder(Category $category, AmendIntent ...$orders)
 * @method Collection<int, BatchCanceledOrder> batchCancelOrder(Category $category, CancelIntent ...$orders)
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
