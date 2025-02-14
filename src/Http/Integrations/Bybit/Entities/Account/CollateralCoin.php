<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Account;

use BackedEnum;
use BybitApi\Enums\CollateralSwitch;
use Illuminate\Contracts\Support\Arrayable;

readonly class CollateralCoin implements Arrayable
{
    public function __construct(
        public BackedEnum|string $coin,
        public CollateralSwitch $switch,
    ) {}

    public function toArray(): array
    {
        return [
            'coin' => $this->coin,
            'collateralSwitch' => $this->switch,
        ];
    }
}
