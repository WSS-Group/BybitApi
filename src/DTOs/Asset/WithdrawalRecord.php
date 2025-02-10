<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\WithdrawStatus;
use BybitApi\Enums\WithdrawType;

/**
 * @property null|string $withdrawId
 * @property null|string $txID
 * @property null|\BybitApi\Enums\WithdrawType $withdrawType
 * @property null|string $coin
 * @property null|string $chain
 * @property null|float $amount
 * @property null|float $withdrawFee
 * @property null|\BybitApi\Enums\WithdrawStatus $status
 * @property null|string $toAddress
 * @property null|string $tag
 * @property null|\Illuminate\Support\Carbon $createTime
 * @property null|\Illuminate\Support\Carbon $updateTime
 */
class WithdrawalRecord extends DTO
{
    public function casts(): array
    {
        return [
            'withdrawId' => StringCast::class,
            'txID' => StringCast::class,
            'withdrawType' => new EnumCast(WithdrawType::class),
            'coin' => StringCast::class,
            'chain' => StringCast::class,
            'amount' => FloatCast::class,
            'withdrawFee' => FloatCast::class,
            'status' => new EnumCast(WithdrawStatus::class),
            'toAddress' => StringCast::class,
            'tag' => StringCast::class,
            'createTime' => TimestampMsCast::class,
            'updateTime' => TimestampMsCast::class,
        ];
    }
}
