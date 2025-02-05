<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SetLeverage;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class NotModifiedFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 110043,
            'retMsg' => 'leverage not modified',
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
            'Content-Length' => '100',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 05 Feb 2025 19:44:01 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738784641555',
            'Ret_code' => '110043',
            'Cache-Control' => 'no-store',
            'Traceid' => '63db2a04618854d262db6562b19ac7b6',
            'Timenow' => '1738784641555',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 65f7295ff05cf36f1a9f5c741069f294.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'o6cvw3L9hhcWk9Jyo2lJ54TpVsKpBmxhc3CUb_Tn2-i88a2lmWFKyg==',
        ];
    }
}
