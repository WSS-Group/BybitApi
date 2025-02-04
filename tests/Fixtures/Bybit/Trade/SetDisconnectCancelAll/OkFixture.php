<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\SetDisconnectCancelAll;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{

    public function body(PendingRequest $pendingRequest): array|string|int
    {
        return [
            'retCode' => 0,
            'retMsg' => 'OK',
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
            'Content-Length' => '238',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 31 Jan 2025 19:48:23 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '20',
            'X-Bapi-Limit-Status' => '19',
            'X-Bapi-Limit-Reset-Timestamp' => '1738352903710',
            'Ret_code' => '0',
            'Traceid' => 'defd64518d996f387daa49c227aeca4b',
            'Timenow' => '1738352903710',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 ce09805ec98c845e8efd33f8a654a7a2.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'OBUrbguh3U4ePjjYhjsnUJ50hN7RfiYZvucNEVGGOtLvoFWLgtZNxw==',
        ];
    }
}
