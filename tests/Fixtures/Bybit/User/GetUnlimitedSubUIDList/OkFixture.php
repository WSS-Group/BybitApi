<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\GetUnlimitedSubUIDList;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => '',
            'result' => [
                'subMembers' => [
                    0 => [
                        'uid' => strval(rand(100000000, 999999999)),
                        'username' => 'foobar1',
                        'memberType' => 1,
                        'status' => 1,
                        'remark' => 'test',
                        'accountMode' => 3,
                    ],
                    1 => [
                        'uid' => strval(rand(100000000, 999999999)),
                        'username' => 'foobar2',
                        'memberType' => 1,
                        'status' => 1,
                        'remark' => 'test',
                        'accountMode' => 3,
                    ],
                ],
                'nextCursor' => '119863',
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
            'Content-Length' => '312',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 11 Feb 2025 17:33:59 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739295239711',
            'Ret_code' => '0',
            'Traceid' => '65b099a075cac15e1be8443124763ee3',
            'Timenow' => '1739295239719',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 47c1359807d43ce291253d0840c23364.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'U9HNZ8LpQuqAtlC9Ufog3muK4fT5Ygu5BL4WP1Ivju_wGXN7P7dAkw==',
        ];
    }
}
