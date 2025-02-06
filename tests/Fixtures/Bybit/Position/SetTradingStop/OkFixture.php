<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SetTradingStop;

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
            'result' => [],
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
            'Content-Length' => '76',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 17:16:02 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738862162379',
            'Ret_code' => '0',
            'Traceid' => '4d3afd7fdb619a934f16e0cea87bd71a',
            'Timenow' => '1738862162380',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 3c7e0f580e6e0538d1a02036c4045598.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'wAIYadqQkPGhZ0pJFT0n60eug0p2hl-hLGxhdOMVc_BR6dfko8klyg==',
        ];
    }
}
