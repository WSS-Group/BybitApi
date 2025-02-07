<?php

namespace BybitApi\DTOs\Position;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionStatus;
use BybitApi\Enums\Side;
use BybitApi\Enums\TradeMode;

/**
 * @property null|PositionIndex $positionIdx
 * @property null|int $riskId
 * @property null|float $riskLimitValue
 * @property null|string $symbol
 * @property null|Side $side
 * @property null|float $size
 * @property null|float $avgPrice
 * @property null|float $positionValue
 * @property null|TradeMode $tradeMode
 * @property null|bool $autoAddMargin
 * @property null|PositionStatus $positionStatus
 * @property null|float $leverage
 * @property null|float $markPrice
 * @property null|float $liqPrice
 * @property null|float $bustPrice
 * @property null|float $positionIM
 * @property null|float $positionMM
 * @property null|float $positionBalance
 * @property null|float $takeProfit
 * @property null|float $stopLoss
 * @property null|float $trailingStop
 * @property null|float $sessionAvgPrice
 * @property null|float $delta
 * @property null|float $gamma
 * @property null|float $vega
 * @property null|float $theta
 * @property null|float $unrealisedPnl
 * @property null|float $curRealisedPnl
 * @property null|float $cumRealisedPnl
 * @property null|int $adlRankIndicator
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|\Illuminate\Support\Carbon $updatedTime
 * @property null|int $seq
 * @property null|bool $isReduceOnly
 * @property null|\Illuminate\Support\Carbon $mmrSysUpdatedTime
 * @property null|\Illuminate\Support\Carbon $leverageSysUpdatedTime
 */
class Info extends DTO
{
    public function casts(): array
    {
        return [
            'positionIdx' => new EnumCast(PositionIndex::class),
            'riskId' => IntCast::class,
            'riskLimitValue' => FloatCast::class,
            'symbol' => StringCast::class,
            'side' => new EnumCast(Side::class),
            'size' => FloatCast::class,
            'avgPrice' => FloatCast::class,
            'positionValue' => FloatCast::class,
            'tradeMode' => new EnumCast(TradeMode::class),
            'autoAddMargin' => BooleanCast::class,
            'positionStatus' => new EnumCast(PositionStatus::class),
            'leverage' => FloatCast::class,
            'markPrice' => FloatCast::class,
            'liqPrice' => FloatCast::class,
            'bustPrice' => FloatCast::class,
            'positionIM' => FloatCast::class,
            'positionMM' => FloatCast::class,
            'positionBalance' => FloatCast::class,
            'takeProfit' => FloatCast::class,
            'stopLoss' => FloatCast::class,
            'trailingStop' => FloatCast::class,
            'sessionAvgPrice' => FloatCast::class,
            'delta' => FloatCast::class,
            'gamma' => FloatCast::class,
            'vega' => FloatCast::class,
            'theta' => FloatCast::class,
            'unrealisedPnl' => FloatCast::class,
            'curRealisedPnl' => FloatCast::class,
            'cumRealisedPnl' => FloatCast::class,
            'adlRankIndicator' => IntCast::class,
            'createdTime' => TimestampMsCast::class,
            'updatedTime' => TimestampMsCast::class,
            'seq' => IntCast::class,
            'isReduceOnly' => BooleanCast::class,
            'mmrSysUpdatedTime' => TimestampMsCast::class,
            'leverageSysUpdatedTime' => TimestampMsCast::class,
        ];
    }
}
