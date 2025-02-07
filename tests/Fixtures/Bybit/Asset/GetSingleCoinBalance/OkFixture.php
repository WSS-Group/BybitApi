<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetSingleCoinBalance;

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
                'accountType' => 'FUND',
                'bizType' => 1,
                'accountId' => '100123456',
                'memberId' => '100123456',
                'balance' => [
                    'coin' => 'BTC',
                    'walletBalance' => '2',
                    'transferBalance' => '2',
                    'bonus' => '0',
                    'transferSafeAmount' => '',
                    'ltvTransferSafeAmount' => '',
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
            'Content-Length' => '290',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 17:48:09 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '60',
            'X-Bapi-Limit-Status' => '59',
            'X-Bapi-Limit-Reset-Timestamp' => '1738950489742',
            'Ret_code' => '0',
            'Traceid' => '789713e4efd4d61e4fe29b66d3db67c9',
            'Timenow' => '1738950489754',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'vtHpDcii7M7uP6qW0THTIS2yhonUklZGmhL-5Som3Zo6F4kc8SHnlA==',
        ];
    }
}
