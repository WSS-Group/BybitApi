<?php

namespace BybitApi\Tests\Fixtures;

use Closure;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;

abstract class Fixture
{
    final public static function call(...$params): Closure
    {
        $fixture = new static(...$params);
        return fn (PendingRequest $pendingRequest) => MockResponse::make(
            $fixture->body($pendingRequest),
            $fixture->status($pendingRequest),
            $fixture->headers($pendingRequest),
        );
    }

    abstract public function body(PendingRequest $pendingRequest): array|string|int;

    abstract public function status(PendingRequest $pendingRequest): int;

    abstract public function headers(PendingRequest $pendingRequest): array;
}
