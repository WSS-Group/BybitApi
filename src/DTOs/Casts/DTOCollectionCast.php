<?php

namespace BybitApi\DTOs\Casts;

use Illuminate\Support\Collection;

readonly class DTOCollectionCast implements Castable
{
    /**
     * @param  class-string<\BybitApi\DTOs\DTO>  $dtoFQN
     */
    public function __construct(
        public string $dtoFQN
    ) {
        //
    }

    public function __invoke(mixed $input): ?Collection
    {
        $data = new DTOArrayCast($this->dtoFQN)($input);

        return is_array($data) ? collect($data) : null;
    }
}
