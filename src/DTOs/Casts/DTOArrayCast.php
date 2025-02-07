<?php

namespace BybitApi\DTOs\Casts;

readonly class DTOArrayCast implements Castable
{
    /**
     * @param  class-string<\BybitApi\DTOs\DTO>  $dtoFQN
     */
    public function __construct(
        public string $dtoFQN
    ) {
        //
    }

    public function __invoke(mixed $input): ?array
    {
        if (! is_array($input)) {
            return null;
        }

        return array_map(function ($item) {
            return $this->dtoFQN::init($item);
        }, $input);
    }
}
