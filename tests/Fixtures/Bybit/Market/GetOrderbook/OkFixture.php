<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetOrderbook;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                's' => 'BTCUSDT',
                'b' => [
                    0 => [0 => '96643.5', 1 => '0.001'],
                    1 => [0 => '96600', 1 => '0.003'],
                    2 => [0 => '96574.2', 1 => '0.001'],
                    3 => [0 => '96561.1', 1 => '0.001'],
                    4 => [0 => '96551.1', 1 => '0.434'],
                ],
                'a' => [
                    0 => [0 => '96663.5', 1 => '0.001'],
                    1 => [0 => '96673.5', 1 => '3.014'],
                    2 => [0 => '96900', 1 => '0.003'],
                    3 => [0 => '97050', 1 => '0.003'],
                    4 => [0 => '97200', 1 => '0.003'],
                ],
                'ts' => 1739557714295,
                'u' => 1234958,
                'seq' => 9429331824,
                'cts' => 1739557714265,
            ],
            'retExtInfo' => [],
            'time' => $current->getTimestampMs(),
        ];
    }

    public function status(PendingRequest $pendingRequest): int
    {
        return 200;
    }

    public function headers(PendingRequest $pendingRequest): array
    {
        return [
            'Content-Type' => 'application/json; charset=utf-8',
            'Content-Length' => '1118',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 18:28:35 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '20dbc533d912f566787292622b9768d6',
            'Timenow' => '1739557715092',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'BgDNRdGc8TlLa55DM-jdRWezBZgtN-wa7GZz-bvqjfvUOHXt5lpuLw==',
        ];
    }
}
