<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\DeleteSubApiKey;

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
            'Date' => 'Thu, 13 Feb 2025 18:01:19 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739469678977',
            'Ret_code' => '0',
            'Traceid' => '0363baad5578b8f56034754dbe336977',
            'Timenow' => '1739469679101',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 d1f8b34c042c93e727a98fcf27ef69d8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '-TVAfvVx8gVyBwooV64VvFPCerbDmjS5mpPrSPZLCYEgpHeCfapaMA==',
        ];
    }
}
