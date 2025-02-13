<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\StringArrayCast;
use BybitApi\DTOs\DTO;
use InvalidArgumentException;

/**
 * @property null|string[] $ContractTrade
 * @property null|string[] $Spot
 * @property null|string[] $Wallet
 * @property null|string[] $Options
 * @property null|string[] $Derivatives
 * @property null|string[] $CopyTrading
 * @property null|string[] $BlockTrade
 * @property null|string[] $Exchange
 * @property null|string[] $NFT
 * @property null|string[] $Affiliate
 * @property null|string[] $Earn
 */
class Permissions extends DTO
{
    public function casts(): array
    {
        return [
            'ContractTrade' => StringArrayCast::class,
            'Spot' => StringArrayCast::class,
            'Wallet' => StringArrayCast::class,
            'Options' => StringArrayCast::class,
            'Derivatives' => StringArrayCast::class,
            'CopyTrading' => StringArrayCast::class,
            'BlockTrade' => StringArrayCast::class,
            'Exchange' => StringArrayCast::class,
            'NFT' => StringArrayCast::class,
            'Affiliate' => StringArrayCast::class,
            'Earn' => StringArrayCast::class,
        ];
    }

    public function has(string $permission): bool
    {
        throw_if(count(explode('.', $permission)) !== 2, new InvalidArgumentException('Invalid permission format.'));
        [$group, $permission] = explode('.', $permission);

        return match (true) {
            ! array_key_exists($group, $this->dtoPayload) => false,
            default => in_array($permission, $this->{$group}),
        };
    }
}
