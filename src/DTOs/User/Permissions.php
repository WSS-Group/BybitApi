<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\PermissionsCast;
use BybitApi\DTOs\DTO;
use BybitApi\DTOs\User\Permissions\Affiliate;
use BybitApi\DTOs\User\Permissions\BlockTrade;
use BybitApi\DTOs\User\Permissions\ContractTrade;
use BybitApi\DTOs\User\Permissions\CopyTrading;
use BybitApi\DTOs\User\Permissions\Derivatives;
use BybitApi\DTOs\User\Permissions\Earn;
use BybitApi\DTOs\User\Permissions\Exchange;
use BybitApi\DTOs\User\Permissions\NFT;
use BybitApi\DTOs\User\Permissions\Options;
use BybitApi\DTOs\User\Permissions\Spot;
use BybitApi\DTOs\User\Permissions\Wallet;

/**
 * @property null|ContractTrade $ContractTrade
 * @property null|Spot $Spot
 * @property null|Wallet $Wallet
 * @property null|Options $Options
 * @property null|Derivatives $Derivatives
 * @property null|CopyTrading $CopyTrading
 * @property null|BlockTrade $BlockTrade
 * @property null|Exchange $Exchange
 * @property null|NFT $NFT
 * @property null|Affiliate $Affiliate
 * @property null|Earn $Earn
 */
class Permissions extends DTO
{
    public function casts(): array
    {
        return [
            'ContractTrade' => new PermissionsCast(ContractTrade::class, ['Order', 'Position']),
            'Spot' => new PermissionsCast(Spot::class, ['SpotTrade']),
            'Wallet' => new PermissionsCast(
                Wallet::class,
                ['AccountTransfer', 'SubMemberTransfer', 'SubMemberTransferList', 'Withdraw']
            ),
            'Options' => new PermissionsCast(Options::class, ['OptionsTrade']),
            'Derivatives' => new PermissionsCast(Derivatives::class, ['DerivativesTrade']),
            'CopyTrading' => new PermissionsCast(CopyTrading::class, ['ContractTrade']),
            'BlockTrade' => new PermissionsCast(BlockTrade::class, []),
            'Exchange' => new PermissionsCast(Exchange::class, ['ExchangeHistory']),
            'NFT' => new PermissionsCast(NFT::class, ['NFTQueryProductList']),
            'Affiliate' => new PermissionsCast(Affiliate::class, []),
            'Earn' => new PermissionsCast(Earn::class, []),
        ];
    }
}
