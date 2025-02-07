<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetSubUID;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'success',
            'result' => [
                'subMemberIds' => [
                    0 => '100000001',
                    1 => '100000002',
                    2 => '100000003',
                ],
                'transferableSubMemberIds' => [
                    0 => '100000001',
                    1 => '100000002',
                    2 => '100000003',
                ],
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
            'Content-Length' => '198',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 18:24:30 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '60',
            'X-Bapi-Limit-Status' => '59',
            'X-Bapi-Limit-Reset-Timestamp' => '1738952670460',
            'Ret_code' => '0',
            'Traceid' => '10e7d735ef02ac5809b3165976cdf1bf',
            'Timenow' => '1738952670466',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2268373f32ed46c458ef5057fc6f60f8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '-9Ves6t8WBJG-9x6cV1UJg49es7bGQAssHHLJtZhtkJewKgAP7XE9g==',
        ];
    }
}
