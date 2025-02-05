<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SwitchPositionMode;

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
            'Date' => 'Wed, 05 Feb 2025 19:11:36 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738782696942',
            'Ret_code' => '0',
            'Traceid' => '2ab1d0c22f23572b435addcbcefb4ebe',
            'Timenow' => '1738782696942',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 20258a2b3c6766e357360ce1a55204c8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'QykR5lAcfplD0chYgQXh6cPus8xjC_RIp6ERDfWY3ga8DTDzwMBUHw==',
        ];
    }
}
