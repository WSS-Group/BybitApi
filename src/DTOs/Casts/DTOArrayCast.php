<?php

namespace BybitApi\DTOs\Casts;

readonly class DTOArrayCast implements Castable
{

    public function __construct(
        public string $dtoFQN
    ) {
        //
    }

    public function __invoke(mixed $input): ?array
    {
        if (!is_array($input)) {
            return null;
        }
        $data = [];
        foreach ($input as $item) {
            $data[] = $this->dtoFQN::init($item);
        }
        return $data;
    }
}
