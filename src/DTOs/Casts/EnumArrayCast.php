<?php

namespace BybitApi\DTOs\Casts;

use BackedEnum;

class EnumArrayCast implements Castable
{
    public function __construct(
        public string $enumFQN,
        public ?BackedEnum $fallback = null,
        public ?BackedEnum $default = null,
    ) {
        //
    }

    public function __invoke(mixed $input): ?array
    {
        $enumCast = new EnumCast($this->enumFQN, $this->fallback, $this->default);

        return is_array($input)
            ? array_map(fn (mixed $value) => $enumCast($value), $input)
            : null;
    }
}
