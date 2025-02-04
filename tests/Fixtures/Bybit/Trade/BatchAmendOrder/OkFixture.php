<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\BatchAmendOrder;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchAmendOrder $request */
        $request = $pendingRequest->getRequest();

        $orders = [];
        $retExtInfo = [];
        foreach ($request->orders as $order) {
            $orders[] = [
                'category' => 'spot',
                'symbol' => 'BTCUSDT',
                'orderId' => $order->orderId,
                'orderLinkId' => $order->orderLinkId,
            ];
            $retExtInfo[] = [
                'code' => 0,
                'msg' => 'OK',
            ];
        }

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'list' => $orders,
            ],
            'retExtInfo' => [
                'list' => $retExtInfo,
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
            'Content-Length' => '350',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 04 Feb 2025 14:24:51 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '8',
            'X-Bapi-Limit-Reset-Timestamp' => '1738679091598',
            'Ret_code' => '0',
            'Traceid' => '51c1862e34b1be5e2ee13d60203821f1',
            'Timenow' => '1738679091599',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 46162aec8cbe18641ed37c03a5a753be.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 's3j0u2ovsD9yH2kje5rblC9s2xKXkGznH0B5Y_L2mDzi9qVRviy6cQ==',
        ];
    }
}
