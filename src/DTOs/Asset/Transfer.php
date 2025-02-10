<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\TransferStatus;

/**
 * @property null|string $transferId
 * @property null|TransferStatus $status
 */
class Transfer extends DTO
{
    public function casts(): array
    {
        return [
            'transferId' => StringCast::class,
            'status' => new EnumCast(TransferStatus::class),
        ];
    }
}
