<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\TransferStatus;

/**
 * @property null|string $transferId
 * @property null|string $coin
 * @property null|float $amount
 * @property null|\BybitApi\Enums\AccountType $fromAccountType
 * @property null|\BybitApi\Enums\AccountType $toAccountType
 * @property null|\Illuminate\Support\Carbon $timestamp
 * @property null|TransferStatus $status
 */
class TransferRecord extends DTO
{
    public function casts(): array
    {
        return [
            'transferId' => StringCast::class,
            'coin' => StringCast::class,
            'amount' => FloatCast::class,
            'fromAccountType' => new EnumCast(AccountType::class),
            'toAccountType' => new EnumCast(AccountType::class),
            'timestamp' => TimestampMsCast::class,
            'status' => new EnumCast(TransferStatus::class),
        ];
    }
}
