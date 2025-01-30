<?php

namespace BybitApi\Facades;

use BybitApi\DTOs\Trade\PlacedOrder;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Entity\Order;

/**
 * @method PlacedOrder placeOrder(Category $category, Order $order)
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
