<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\CancelOrder;

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
            'result' => [
                'orderId' => $pendingRequest->getRequest()->orderId,
                'orderLinkId' => $pendingRequest->getRequest()->orderId,
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
            "Date" => "Fri, 31 Jan 2025 18:56:16 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "20",
            "X-Bapi-Limit-Status" => "19",
            "X-Bapi-Limit-Reset-Timestamp" => "1738349776352",
            "Ret_code" => "0",
            "Traceid" => "1caa11834b524930c27158c9b21e5c6c",
            "Timenow" => "1738349776353",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 94e3ea0ab5975966bae06782503f9692.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "2Ebqg6BWpLUaDQnS-PTIF7y4GEZK7eFfwc_ZFzj0JOlqtP7FyPtYgA==",
        ];
    }
}
