<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\SetAutoAddMargin;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
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
            'Content-Length' => '76',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 19:15:52 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738869352293',
            'Ret_code' => '0',
            'Traceid' => '6be821997c03fdfb6515c747009b2621',
            'Timenow' => '1738869352294',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'IKDB2iLVDCryayba7jrIv2r72zg-nSVj6MdJMZ7444H9ZBLC0Zzqzw==',
        ];
    }
}
