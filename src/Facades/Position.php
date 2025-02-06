<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\AddOrReduceMarginInfo;
use BybitApi\DTOs\Position\ClosePNL;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionMode;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TradeMode;
use BybitApi\Enums\TriggerBy;
use Illuminate\Support\Carbon;

/**
 * @method CursorCollection<int, Info> getPositionInfo(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?int $limit = null, ?string $cursor = null)
 * @method true setLeverage(Category $category, BackedEnum|string $symbol, float $buyLeverage, float $sellLeverage)
 * @method true switchCrossIsolatedMargin(Category $category, BackedEnum|string $symbol, TradeMode $tradeMode, string $buyLeverage, string $sellLeverage)
 * @method true switchPositionMode(Category $category, PositionMode $mode, null|BackedEnum|string $symbol = null, null|BackedEnum|string $coin = null)
 * @method true setTradingStop(Category $category, BackedEnum|string $symbol, TakeProfitStopLossMode $tpslMode, PositionIndex $positionIdx, ?string $takeProfit = null, ?string $stopLoss = null, ?string $trailingStop = null, ?TriggerBy $tpTriggerBy = null, ?TriggerBy $slTriggerBy = null, ?string $activePrice = null, ?string $tpSize = null, ?string $slSize = null, ?string $tpLimitPrice = null, ?string $slLimitPrice = null, ?OrderType $tpOrderType = null, ?OrderType $slOrderType = null)
 * @method true setAutoAddMargin(Category $category, BackedEnum|string $symbol, bool $autoAddMargin, ?PositionIndex $positionIdx = null)
 * @method AddOrReduceMarginInfo addOrReduceMargin(Category $category, BackedEnum|string $symbol, string $margin, ?PositionIndex $positionIdx = null)
 * @method CursorCollection<int, ClosePNL> getClosedPnL(Category $category, null|BackedEnum|string $symbol = null, ?Carbon $startTime = null, ?Carbon $endTime = null, ?int $limit = null, ?string $cursor = null)
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
