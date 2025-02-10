<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\ExchangeStatus;

/**
 * @property null|string $quoteTxId
 * @property null|ExchangeStatus $exchangeStatus
 */
class Convert extends DTO
{
    public function casts(): array
    {
        return [
            'quoteTxId' => StringCast::class,
            'exchangeStatus' => new EnumCast(ExchangeStatus::class),
        ];
    }
}
