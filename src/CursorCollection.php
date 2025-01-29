<?php

namespace BybitApi;

use Illuminate\Support\Collection;

class CursorCollection extends Collection
{
    readonly private ?string $cursor;

    public function setCursor(?string $cursor): static
    {
        $this->cursor = $cursor;
        return $this;
    }

    public function getCursor(): ?string
    {
        return $this->cursor;
    }
}