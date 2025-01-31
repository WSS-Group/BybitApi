<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetBybitServerTime;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class NotFoundFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        return '';
    }

    public function status(PendingRequest $pendingRequest): int
    {
        return 404;
    }

    public function headers(PendingRequest $pendingRequest): array
    {
        return [
            'Content-Type' => 'application/json; charset=utf-8',
            'Content-Length' => '134',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 27 Jan 2025 14:40:19 GMT',
            'x-cld-src' => 'Loc-A',
            'Traceid' => '6329ebe7e3bdc5815cadd0d8438dc3e5',
            'Timenow' => '1737988819159',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e3a3c8a0ec7b3e46dacb56f83c6dc628.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'IoG7crK-8xVUdK8Y_5h0BlvXuIKt3UDwqYL0IELp5-MooELhm_Td2A==',
        ];
    }
}
