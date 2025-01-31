<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\BatchPlaceOrder;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OneSuccessAndOneErrorFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        $orderId = strval(fake()->numberBetween(1000000000000000000, 9999999999999999999));

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'list' => [
                    0 => [
                        'category' => 'spot',
                        'symbol' => 'BTCUSDT',
                        'orderId' => '',
                        'orderLinkId' => '',
                        'createAt' => '',
                    ],
                    1 => [
                        'category' => 'spot',
                        'symbol' => 'BTCUSDT',
                        'orderId' => $orderId,
                        'orderLinkId' => $orderId,
                        'createAt' => $current->getTimestampMs(),
                    ],
                ],
            ],
            'retExtInfo' => [
                'list' => [
                    0 => [
                        'code' => 170140,
                        'msg' => 'Order value exceeded lower limit.',
                    ],
                    1 => [
                        'code' => 0,
                        'msg' => 'OK',
                    ],
                ],
            ],
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
            'Content-Length' => '389',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 30 Jan 2025 19:36:44 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '20',
            'X-Bapi-Limit-Status' => '18',
            'X-Bapi-Limit-Reset-Timestamp' => '1738265804109',
            'Ret_code' => '0',
            'Traceid' => '5145ebe1a84dc748bdb1d7626ea5ac09',
            'Timenow' => '1738265804110',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 46162aec8cbe18641ed37c03a5a753be.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'xPxZ0L-Xt5AdasUVaMTzkqIcEMqq2KI9D416w-OS42p-GI6RtAkfFA==',
        ];
    }
}
