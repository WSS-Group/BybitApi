<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SetTradingStop;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class NotModifiedFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 34040,
            'retMsg' => 'not modified',
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
            'Content-Length' => '90',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 17:16:05 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738862165822',
            'Ret_code' => '34040',
            'Cache-Control' => 'no-store',
            'Traceid' => '6429db4c9b97c7a1159d3bbe82ebebf8',
            'Timenow' => '1738862165823',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'FafvwUv16QGGXMiK-11GG0m_tQ5vUCGPOX7dP4u1y0t3XgHQVhlwcQ==',
        ];
    }
}
