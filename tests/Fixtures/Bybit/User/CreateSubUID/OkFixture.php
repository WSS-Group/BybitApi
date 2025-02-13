<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\CreateSubUID;

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
                'uid' => strval(rand(10000000, 99999999)),
                'username' => 'foo',
                'memberType' => 1,
                'status' => 1,
                'remark' => '',
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
            'Content-Length' => '152',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 11 Feb 2025 19:25:49 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739301948884',
            'Ret_code' => '0',
            'Traceid' => '5572fe6c01ac756d6d18407fef7852e1',
            'Timenow' => '1739301949175',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 20258a2b3c6766e357360ce1a55204c8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'RI8qwAmZaTRA2QQuscBkN88x6Z8YTbG_B-7n1c_g6vgcGHRwDVQUww==',
        ];
    }
}
