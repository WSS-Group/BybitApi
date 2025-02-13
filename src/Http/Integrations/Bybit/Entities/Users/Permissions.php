<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Users;

use BybitApi\Conditional;
use Illuminate\Contracts\Support\Arrayable;

class Permissions implements Arrayable
{
    public function __construct(
        public array $contractTrade = [],
        public array $spot = [],
        public array $wallet = [],
        public array $options = [],
        public array $exchange = [],
        public array $copyTrading = [],
        public array $blockTrade = [],
        public array $nft = [],
        public array $affiliate = [],
    ) {}

    public function toArray(): array
    {
        return Conditional::array([
            'ContractTrade' => Conditional::ifNotEmpty($this->contractTrade),
            'Spot' => Conditional::ifNotEmpty($this->spot),
            'Wallet' => Conditional::ifNotEmpty($this->wallet),
            'Options' => Conditional::ifNotEmpty($this->options),
            'Exchange' => Conditional::ifNotEmpty($this->exchange),
            'CopyTrading' => Conditional::ifNotEmpty($this->copyTrading),
            'BlockTrade' => Conditional::ifNotEmpty($this->blockTrade),
            'NFT' => Conditional::ifNotEmpty($this->nft),
            'Affiliate' => Conditional::ifNotEmpty($this->affiliate),
        ]);
    }
}
