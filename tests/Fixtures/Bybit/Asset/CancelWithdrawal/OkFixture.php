<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\CancelWithdrawal;

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
                'status' => 1,
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
            'Content-Length' => '151',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 14:18:37 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '20',
            'X-Bapi-Limit-Status' => '19',
            'X-Bapi-Limit-Reset-Timestamp' => '1739197117207',
            'Ret_code' => '0',
            'Traceid' => '59793980d9615c37418f4c215a54abd3',
            'Timenow' => '1739197117379',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2268373f32ed46c458ef5057fc6f60f8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'vXCAS5lJS6kA8_yEl15Sf84SdK0fVf5q8MTRfkSCKfWWgrIcTKBDRA==',
        ];
    }
}
