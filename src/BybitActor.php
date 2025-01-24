<?php

namespace BybitApi;

readonly class BybitActor
{
    public function __construct(
        public string $apiKey,
        public string $secretKey,
        public int $recvWindow = 10000,
        public ?string $referer = null,
        public bool $test = false,
    ) {
        //
    }
}