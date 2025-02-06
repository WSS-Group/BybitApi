<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionMode;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TriggerBy;

/**
 * @method CursorCollection<int, Info> getPositionInfo(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?int $limit = null, ?string $cursor = null)
 * @method true setLeverage( Category $category, BackedEnum|string $symbol, float $buyLeverage, float $sellLeverage)
 * @method true switchPositionMode(Category $category, PositionMode $mode, null|BackedEnum|string $symbol = null, null|BackedEnum|string $coin = null)
 * @method true setTradingStop(Category $category, BackedEnum|string $symbol, TakeProfitStopLossMode $tpslMode, PositionIndex $positionIdx, ?string $takeProfit = null, ?string $stopLoss = null, ?string $trailingStop = null, ?TriggerBy $tpTriggerBy = null, ?TriggerBy $slTriggerBy = null, ?string $activePrice = null, ?string $tpSize = null, ?string $slSize = null, ?string $tpLimitPrice = null, ?string $slLimitPrice = null, ?OrderType $tpOrderType = null, ?OrderType $slOrderType = null)
 * @method true confirmNewRiskLimit(Category $category, BackedEnum|string $symbol)
 *
 * @see \BybitApi\Groups\Position
 */
class Position extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Position::class;
    }
}
