<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SwitchPositionMode;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class NotModifiedFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 110025,
            'retMsg' => 'Position mode is not modified',
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
            'Content-Length' => '108',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 05 Feb 2025 19:12:24 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738782744918',
            'Ret_code' => '110025',
            'Cache-Control' => 'no-store',
            'Traceid' => '52a3d5ee3ef8f58820787829dc2d617d',
            'Timenow' => '1738782744918',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 0b631faf1a288a571bee18855438ce88.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'yZL-SAWUkAELEl7Pdh_wPNdsEsU12PRSLtfp1QnqFrqVVpJ8_N1VeQ==',
        ];
    }
}
