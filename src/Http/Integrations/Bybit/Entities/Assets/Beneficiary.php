<?php

namespace BybitApi\Http\Integrations\Bybit\Entities\Assets;

use BybitApi\Conditional;
use Illuminate\Contracts\Support\Arrayable;

readonly class Beneficiary implements Arrayable
{
    public function __construct(
        public string $vaspEntityId,
        public ?string $beneficiaryName = null,
    ) {
        //
    }

    public function toArray(): array
    {
        return Conditional::array([
            'vaspEntityId' => $this->vaspEntityId,
            'beneficiaryName' => Conditional::ifNotEmpty($this->beneficiaryName),
        ]);
    }
}
