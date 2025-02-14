<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetMmpState;

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
                'result' => [
                    0 => [
                        'baseCoin' => 'ETH',
                        'mmpEnabled' => false,
                        'window' => '0',
                        'frozenPeriod' => '0',
                        'qtyLimit' => '0',
                        'deltaLimit' => '0',
                        'mmpFrozenUntil' => '0',
                        'mmpFrozen' => false,
                    ],
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
            'Content-Length' => '227',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 18:04:35 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '76da5ca970818d4d1ea8f57b502a5d11',
            'Timenow' => '1739556275006',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 d1f8b34c042c93e727a98fcf27ef69d8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '34mVT_QvGVonbqU93PXBmMaxSXQTWlALgTW0y2kjlxFu4i8ajBNWxA==',
        ];
    }
}
