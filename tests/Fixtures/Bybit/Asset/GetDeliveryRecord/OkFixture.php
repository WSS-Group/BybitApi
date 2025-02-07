<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetDeliveryRecord;

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
                'nextPageCursor' => '132791%3A0%2C132791%3A0',
                'category' => 'linear',
                'list' => [
                    0 => [
                        'symbol' => 'BTCUSDT',
                        'side' => 'Buy',
                        'deliveryTime' => 1672300800860,
                        'strike' => '16000',
                        'fee' => '0.00000000',
                        'position' => '0.01',
                        'deliveryPrice' => '16541.86369547',
                        'deliveryRpl' => '3.5',
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
            'Content-Length' => '34433',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 18:49:48 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1738954188527',
            'Ret_code' => '0',
            'Traceid' => '784e907c20393fe26c8c6d695b2f9115',
            'Timenow' => '1738954188567',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 47c1359807d43ce291253d0840c23364.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'xK9ZZ0F6VAlUYhsJQPrLUMf6nDfnL5kv0vabM4pALUhack4vhLHbNw==',
        ];
    }
}
