<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetWithdrawableAmount;

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
                'limitAmountUsd' => '89701.59',
                'withdrawableAmount' => [
                    'FUND' => [
                        'coin' => 'BTC',
                        'withdrawableAmount' => '1.20553083',
                        'availableBalance' => '2',
                    ],
                    'SPOT' => [
                        'coin' => 'BTC',
                        'withdrawableAmount' => '1.20553083',
                        'availableBalance' => '2',
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
            'Content-Length' => '210',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 18:04:32 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '300',
            'X-Bapi-Limit-Status' => '299',
            'X-Bapi-Limit-Reset-Timestamp' => '1738951472231',
            'Ret_code' => '0',
            'Traceid' => '7acea1af783b73f26ef8258b3affda97',
            'Timenow' => '1738951472262',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'gBhPWlgzgjhA-tpprMuOjSVvT_STKdJEJF_-6QzUuyd4J1q8Z9fG_A==',
        ];
    }
}
