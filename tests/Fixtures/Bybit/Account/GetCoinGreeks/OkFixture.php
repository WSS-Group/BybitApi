<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetCoinGreeks;

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
                'list' => [
                    0 => [
                        'baseCoin' => 'BTC',
                        'totalDelta' => '0.00004001',
                        'totalGamma' => '-0.00000009',
                        'totalVega' => '-0.00039689',
                        'totalTheta' => '0.01243824',
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
            'Content-Length' => '85',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 16:36:52 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739551012929',
            'Ret_code' => '0',
            'Traceid' => '4e5e01502fabd7b3782f5e7bd1bd6e74',
            'Timenow' => '1739551012935',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e975298f8c40402e704ce27ac4df9a30.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '08NyV2gSG_FYJhxe_20o9buHedgE0GD7wpZcfZlRH9dcUMqXuTFBkw==',
        ];
    }
}
