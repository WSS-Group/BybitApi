<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\AmendOrder;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Trade\AmendOrder $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'orderId' => $request->order->orderId,
                'orderLinkId' => $request->order->orderLinkId,
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
            "Content-Type" => "application/json; charset=utf-8",
            "Content-Length" => "143",
            "Connection" => "keep-alive",
            "Date" => "Tue, 04 Feb 2025 14:30:05 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "10",
            "X-Bapi-Limit-Status" => "9",
            "X-Bapi-Limit-Reset-Timestamp" => "1738679405660",
            "Ret_code" => "0",
            "Traceid" => "4201fcbf211aa8730568a357b82a099b",
            "Timenow" => "1738679405660",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 1e1ba059ef27f31424c8abf622adfb8e.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "2Dq5xryuS4waKhWzg6WgikZ27D-qBRE5JKP1cZTgpIxwdrOqIbKVKQ==",
        ];
    }
}
