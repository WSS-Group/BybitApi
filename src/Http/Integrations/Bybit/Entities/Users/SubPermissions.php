<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Users;

use Illuminate\Contracts\Support\Arrayable;

class SubPermissions implements Arrayable
{
    public function __construct(
        public array $contractTrade = [],
        public array $spot = [],
        public array $wallet = [],
        public array $options = [],
        public array $exchange = [],
        public array $copyTrading = [],
    ) {}

    public function toArray(): array
    {
        return [
            'ContractTrade' => $this->contractTrade,
            'Spot' => $this->spot,
            'Wallet' => $this->wallet,
            'Options' => $this->options,
            'Exchange' => $this->exchange,
            'CopyTrading' => $this->copyTrading,
        ];
    }
}
