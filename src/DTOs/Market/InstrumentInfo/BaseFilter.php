<?php

namespace BybitApi\DTOs\Market\InstrumentInfo;

use BcMath\Number;
use BybitApi\DTOs\DTO;
use RoundingMode;

abstract class BaseFilter extends DTO
{
    abstract public function format(float $value, RoundingMode $roundMode): Number;
}
