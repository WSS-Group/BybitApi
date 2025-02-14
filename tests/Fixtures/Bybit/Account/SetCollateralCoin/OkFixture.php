<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\SetCollateralCoin;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'SUCCESS',
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
            'Content-Length' => '81',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 14:56:08 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '429a865b97fa1a4d2ba87a20f282471c',
            'Timenow' => '1739544968434',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 47c1359807d43ce291253d0840c23364.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'w1CAlfOUIK1ssJcPt8Iu175S8fYDP8PlZa2D3UWdMAxQ1tDDuUlbkA==',
        ];
    }
}
