<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\GetLimitedSubUIDList;

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
                    2 => [
                        'uid' => strval(rand(100000000, 999999999)),
                        'username' => 'foobar3',
                        'memberType' => 1,
                        'status' => 1,
                        'remark' => 'test',
                        'accountMode' => 3,
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
            'Content-Length' => '391',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 11 Feb 2025 17:16:02 GMT',
            'x-cld-src' => 'Loc-T',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1739294162301',
            'Ret_code' => '0',
            'Traceid' => '2e21c39f843a99af72dfae94a72929bd',
            'Timenow' => '1739294162330',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e975298f8c40402e704ce27ac4df9a30.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '4YcrYOCJgKLWKd_ZdSbcc5GB-bl0zCdxbUCdf3_yq-iTnNC4rQhHPg==',
        ];
    }
}
