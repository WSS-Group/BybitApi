<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetDcpInfo;

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
                'dcpInfos' => [
                    0 => [
                        'product' => 'SPOT',
                        'dcpStatus' => 'ON',
                        'timeWindow' => '10',
                    ],
                    1 => [
                        'product' => 'DERIVATIVES',
                        'dcpStatus' => 'ON',
                        'timeWindow' => '10',
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
            'Content-Length' => '94',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 16:44:56 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739551496112',
            'Ret_code' => '0',
            'Traceid' => '351c852f64e8e69719ad5666080b4d3c',
            'Timenow' => '1739551496118',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 65f7295ff05cf36f1a9f5c741069f294.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'XwQIJHHhWWvpp52CmcikGh5cowfQtn1QNanJtfjegsmpCdD8zGxwGA==',
        ];
    }
}
