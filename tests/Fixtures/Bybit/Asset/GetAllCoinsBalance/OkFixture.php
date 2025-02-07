<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetAllCoinsBalance;

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
                'memberId' => '100398343',
                'accountType' => 'FUND',
                'balance' => [
                    0 => [
                        'coin' => 'BTC',
                        'transferBalance' => '2',
                        'walletBalance' => '2',
                        'bonus' => '',
                    ],
                    1 => [
                        'coin' => 'USDT',
                        'transferBalance' => '0',
                        'walletBalance' => '0',
                        'bonus' => '',
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
            'Content-Length' => '273',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 16:37:46 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1738946266164',
            'Ret_code' => '0',
            'Traceid' => '257374328bd1a05e2082b69f3f93e32d',
            'Timenow' => '1738946266174',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 257bf616e82b7bdb9c0b2562445411f0.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'wBRAxCwY_B1aYZCTb2R-J-Snc5IBE_Ea0HaaAI5zPk1yaz_nF0zkhQ==',
        ];
    }
}
