<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\FreezeSubUID;

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
            'result' => [],
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
            'Content-Length' => '74',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 11 Feb 2025 17:49:26 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739296166020',
            'Ret_code' => '0',
            'Traceid' => '08f831eff541c5542e5dbee565f9a65b',
            'Timenow' => '1739296166299',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 81d299a580e85cd7d4af1e1123f3282a.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'xzaNX-VU9x3SSZmOpddjDltgVILxd8Sjoeesqf0OX43t1esModMwtw==',
        ];
    }
}
