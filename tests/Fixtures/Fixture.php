<?php

namespace BybitApi\Tests\Fixtures;

use Saloon\Http\Faking\MockResponse;

abstract class Fixture
{
    final public function __invoke(): MockResponse
    {
        return MockResponse::make(
            $this->body(),
            $this->status(),
            $this->headers(),
        );
    }

    abstract public function body(): array|string|int;

    abstract public function status(): int;

    abstract public function headers(): array;
}