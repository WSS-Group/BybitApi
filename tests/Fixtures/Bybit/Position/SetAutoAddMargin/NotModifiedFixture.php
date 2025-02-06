<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SetAutoAddMargin;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class NotModifiedFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 10001,
            'retMsg' => 'auto add margin not modified',
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
            'Content-Length' => '106',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 19:15:53 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738869353698',
            'Ret_code' => '10001',
            'Cache-Control' => 'no-store',
            'Traceid' => '3c9eb52aaf97d6814f21d7332fe074ca',
            'Timenow' => '1738869353698',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 94e3ea0ab5975966bae06782503f9692.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '_k9Phtu4WCh5Sy_OsqIHseaymUQpo30KOHOliUCUoJEvhMd1JK796Q==',
        ];
    }
}
