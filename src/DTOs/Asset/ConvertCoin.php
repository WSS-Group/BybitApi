<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CoinType;

/**
 * @property null|string $coin
 * @property null|string $fullName
 * @property null|string $icon
 * @property null|string $iconNight
 * @property null|string $accuracyLength
 * @property null|CoinType $coinType
 * @property null|float $balance
 * @property null|float $uBalance
 * @property null|float $singleFromMinLimit
 * @property null|float $singleFromMaxLimit
 * @property null|bool $disableFrom
 * @property null|bool $disableTo
 * @property null|bool $timePeriod
 * @property null|float $singleToMinLimit
 * @property null|float $singleToMaxLimit
 * @property null|float $dailyFromMinLimit
 * @property null|float $dailyFromMaxLimit
 * @property null|float $dailyToMinLimit
 * @property null|float $dailyToMaxLimit
 */
class ConvertCoin extends DTO
{
    public function casts(): array
    {
        return [
            'coin' => StringCast::class,
            'fullName' => StringCast::class,
            'icon' => StringCast::class,
            'iconNight' => StringCast::class,
            'accuracyLength' => IntCast::class,
            'coinType' => new EnumCast(CoinType::class, CoinType::OTHER),
            'balance' => FloatCast::class,
            'uBalance' => FloatCast::class,
            'singleFromMinLimit' => FloatCast::class,
            'singleFromMaxLimit' => FloatCast::class,
            'disableFrom' => BooleanCast::class,
            'disableTo' => BooleanCast::class,
            'singleToMinLimit' => FloatCast::class,
            'singleToMaxLimit' => FloatCast::class,
            'dailyFromMinLimit' => FloatCast::class,
            'dailyFromMaxLimit' => FloatCast::class,
            'dailyToMinLimit' => FloatCast::class,
            'dailyToMaxLimit' => FloatCast::class,
        ];
    }
}
