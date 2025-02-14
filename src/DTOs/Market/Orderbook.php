<?php

namespace BybitApi\DTOs\Market;

use BybitApi\DTOs\Casts\DTOCollectionCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampMsCast;
use BybitApi\DTOs\DTO;
use BybitApi\DTOs\Market\Orderbook\Ask;
use BybitApi\DTOs\Market\Orderbook\Bid;

/**
 * @property null|string $symbol
 * @property null|\Illuminate\Support\Collection<int, Bid> $bid
 * @property null|\Illuminate\Support\Collection<int, Ask> $ask
 * @property null|\Illuminate\Support\Carbon $timestamp
 * @property null|int $update_id
 * @property null|int $cross_sequence
 * @property null|\Illuminate\Support\Carbon $cts
 */
class Orderbook extends DTO
{
    public function aliases(): array
    {
        return [
            's' => 'symbol',
            'b' => 'bid',
            'a' => 'ask',
            'ts' => 'timestamp',
            'u' => 'update_id',
            'seq' => 'cross_sequence',
        ];
    }

    public function casts(): array
    {
        return [
            'symbol' => StringCast::class,
            'bid' => new DTOCollectionCast(Bid::class),
            'ask' => new DTOCollectionCast(Ask::class),
            'timestamp' => TimestampMsCast::class,
            'update_id' => IntCast::class,
            'cross_sequence' => IntCast::class,
            'cts' => TimestampMsCast::class,
        ];
    }
}
