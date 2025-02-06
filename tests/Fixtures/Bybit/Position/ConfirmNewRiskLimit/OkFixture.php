<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\ConfirmNewRiskLimit;

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
            'Date' => 'Wed, 05 Feb 2025 19:43:05 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738784585265',
            'Ret_code' => '0',
            'Traceid' => '515ff6a30d3914fd724fb251228bf14e',
            'Timenow' => '1738784585266',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 1e1ba059ef27f31424c8abf622adfb8e.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'WbCD0S82z7i3fbk9xq3adip3D4m6zubaGTmzbYEAmeF5FeAG_N0fcA==',
        ];
    }
}
