<?php

namespace BybitApi\DTOs\Casts;

use BackedEnum;

readonly class EnumCast implements Castable
{
    public function __construct(
        public string $enumFQN,
        public ?BackedEnum $fallback = null,
        public ?BackedEnum $default = null,
    ) {
        //
    }

    public function __invoke(mixed $input): ?BackedEnum
    {
        if (is_string($input) && $input !== '') {
            return $this->enumFQN::tryFrom($input) ?? $this->fallback;
        }

        return $this->default;
    }
}
