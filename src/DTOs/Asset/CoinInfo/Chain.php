<?php

namespace BybitApi\DTOs\Asset\CoinInfo;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $chain
 * @property null|string $chainType
 * @property null|int $confirmation
 * @property null|float $withdrawFee
 * @property null|float $depositMin
 * @property null|float $withdrawMin
 * @property null|float $minAccuracy
 * @property null|bool $chainDeposit
 * @property null|bool $chainWithdraw
 * @property null|float $withdrawPercentageFee
 * @property null|string $contractAddress
 */
class Chain extends DTO
{
    public function casts(): array
    {
        return [
            'chain' => StringCast::class,
            'chainType' => StringCast::class,
            'confirmation' => IntCast::class,
            'withdrawFee' => FloatCast::class,
            'depositMin' => FloatCast::class,
            'withdrawMin' => FloatCast::class,
            'minAccuracy' => FloatCast::class,
            'chainDeposit' => BooleanCast::class,
            'chainWithdraw' => BooleanCast::class,
            'withdrawPercentageFee' => FloatCast::class,
            'contractAddress' => StringCast::class,
        ];
    }
}
