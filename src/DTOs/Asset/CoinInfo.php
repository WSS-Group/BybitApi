<?php

namespace BybitApi\DTOs\Asset;

use BybitApi\DTOs\Asset\CoinInfo\Chain;
use BybitApi\DTOs\Casts\DTOCollectionCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;

/**
 * @property null|string $name
 * @property null|string $coin
 * @property null|float $remainAmount
 * @property null|\Illuminate\Support\Collection<int, Chain> $chains
 */
class CoinInfo extends DTO
{
    public function casts(): array
    {
        return [
            'name' => StringCast::class,
            'coin' => StringCast::class,
            'remainAmount' => FloatCast::class,
            'chains' => new DTOCollectionCast(Chain::class),
        ];
    }
}
