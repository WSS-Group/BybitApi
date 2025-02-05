<?php

namespace BybitApi;

use Illuminate\Support\Collection;

class CursorCollection extends Collection
{
    private readonly ?string $cursor;

    /**
     * @param  class-string<\BybitApi\DTOs\DTO>  $dto
     */
    public static function init(array $data, string $dto, ?string $cursor): self
    {
        $collection = new self($data)->map(fn(array $item) => $dto::init($item));
        $collection->cursor = ! empty($cursor) ? $cursor : null;
        return $collection;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }
}
