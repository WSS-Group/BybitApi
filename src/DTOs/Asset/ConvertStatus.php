<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ExchangeStatus;

/**
 * @property null|ConvertAccountType $accountType
 * @property null|string $exchangeTxId
 * @property null|string $userId
 * @property null|string $fromCoin
 * @property null|CoinType $fromCoinType
 * @property null|string $toCoin
 * @property null|CoinType $toCoinType
 * @property null|float $fromAmount
 * @property null|float $toAmount
 * @property null|ExchangeStatus $exchangeStatus
 * @property null|float $convertRate
 * @property null|\Illuminate\Support\Carbon $createdAt
 */
class ConvertStatus extends DTO
{
    public function casts(): array
    {
        return [
            'accountType' => new EnumCast(ConvertAccountType::class),
            'exchangeTxId' => StringCast::class,
            'userId' => StringCast::class,
            'fromCoin' => StringCast::class,
            'fromCoinType' => new EnumCast(CoinType::class),
            'toCoin' => StringCast::class,
            'toCoinType' => new EnumCast(CoinType::class),
            'fromAmount' => FloatCast::class,
            'toAmount' => FloatCast::class,
            'exchangeStatus' => new EnumCast(ExchangeStatus::class, ExchangeStatus::OTHER),
            'convertRate' => FloatCast::class,
            'createdAt' => TimestampMsCast::class,
        ];
    }
}
