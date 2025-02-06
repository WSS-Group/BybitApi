<?php

namespace BybitApi\DTOs\Position;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionStatus;

/**
 * @property null|Category $category
 * @property null|string $symbol
 * @property null|PositionIndex $positionIdx
 * @property null|int $riskId
 * @property null|float $riskLimitValue
 * @property null|float $size
 * @property null|float $avgPrice
 * @property null|float $liqPrice
 * @property null|float $bustPrice
 * @property null|float $markPrice
 * @property null|float $positionValue
 * @property null|float $leverage
 * @property null|bool $autoAddMargin
 * @property null|PositionStatus $positionStatus
 * @property null|float $positionIM
 * @property null|float $positionMM
 * @property null|float $takeProfit
 * @property null|float $stopLoss
 * @property null|float $trailingStop
 * @property null|float $unrealisedPnl
 * @property null|float $cumRealisedPnl
 * @property null|\Illuminate\Support\Carbon $createdTime
 * @property null|\Illuminate\Support\Carbon $updatedTime
 */
class AddOrReduceMarginInfo extends DTO
{
    public function casts(): array
    {
        return [
            'category' => new EnumCast(Category::class),
            'symbol' => StringCast::class,
            'positionIdx' => new EnumCast(PositionIndex::class),
            'riskId' => IntCast::class,
            'riskLimitValue' => FloatCast::class,
            'size' => FloatCast::class,
            'avgPrice' => FloatCast::class,
            'liqPrice' => FloatCast::class,
            'bustPrice' => FloatCast::class,
            'markPrice' => FloatCast::class,
            'positionValue' => FloatCast::class,
            'leverage' => FloatCast::class,
            'autoAddMargin' => BooleanCast::class,
            'positionStatus' => new EnumCast(PositionStatus::class),
            'positionIM' => FloatCast::class,
            'positionMM' => FloatCast::class,
            'takeProfit' => FloatCast::class,
            'stopLoss' => FloatCast::class,
            'trailingStop' => FloatCast::class,
            'unrealisedPnl' => FloatCast::class,
            'cumRealisedPnl' => FloatCast::class,
            'createdTime' => TimestampCast::class,
            'updatedTime' => TimestampCast::class,
        ];
    }
}
