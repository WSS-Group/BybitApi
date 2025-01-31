<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\PlaceOrder;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        $orderId = strval(fake()->numberBetween(1000000000000000000, 9999999999999999999));

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'orderId' => $orderId,
                'orderLinkId' => $orderId,
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
            'Content-Length' => '143',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 30 Jan 2025 19:06:41 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '20',
            'X-Bapi-Limit-Status' => '19',
            'X-Bapi-Limit-Reset-Timestamp' => '1738264001781',
            'Ret_code' => '0',
            'Traceid' => '1881f7cf8ea3989165ea027f97a8e7bd',
            'Timenow' => '1738264001782',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 257bf616e82b7bdb9c0b2562445411f0.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'oLt_IokqnE8OkPJ_sT33LlRM__FjNE-z9WnVD2anJHdPblx_extFzg==',
        ];
    }
}
