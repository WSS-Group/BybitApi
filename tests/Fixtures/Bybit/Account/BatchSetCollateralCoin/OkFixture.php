<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\BatchSetCollateralCoin;

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
                'nextPageCursor' => null,
                'list' => [
                    0 => [
                        'coin' => 'BTC',
                        'collateralSwitch' => 'ON',
                    ],
                    1 => [
                        'coin' => 'ETH',
                        'collateralSwitch' => 'OFF',
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
            'Content-Length' => '168',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 16:25:43 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739550343710',
            'Ret_code' => '0',
            'Traceid' => '66989cd4a166d23963737cd43ce590e5',
            'Timenow' => '1739550343744',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 94e3ea0ab5975966bae06782503f9692.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'yWLxKWjNH0svGGnPsbEIQrZKtidmscKmaJq6HlMmD7JgNJ5n26km5A==',
        ];
    }
}
