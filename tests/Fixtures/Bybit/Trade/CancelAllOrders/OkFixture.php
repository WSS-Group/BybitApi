<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\CancelAllOrders;

use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Tests\Fixtures\Fixture;
use Illuminate\Support\Collection;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function __construct(
        public Collection $orders
    ) {
        $this->orders->ensure(CanceledOrder::class);
    }

    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                "list" => $this->orders->toArray(),
                "success" => "1"
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
            "Content-Length" => "238",
            "Connection" => "keep-alive",
            "Date" => "Fri, 31 Jan 2025 19:48:23 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "20",
            "X-Bapi-Limit-Status" => "19",
            "X-Bapi-Limit-Reset-Timestamp" => "1738352903710",
            "Ret_code" => "0",
            "Traceid" => "defd64518d996f387daa49c227aeca4b",
            "Timenow" => "1738352903710",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 ce09805ec98c845e8efd33f8a654a7a2.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "OBUrbguh3U4ePjjYhjsnUJ50hN7RfiYZvucNEVGGOtLvoFWLgtZNxw==",
        ];
    }
}
