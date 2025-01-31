<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\BatchCancelOrders;

use BybitApi\Http\Integrations\Bybit\Entities\OrderToCancel;
use BybitApi\Tests\Fixtures\Fixture;
use Illuminate\Support\Collection;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function __construct(
        public Collection $orders
    ) {
        $this->orders->ensure(OrderToCancel::class);
    }

    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Trade\BatchCancelOrder $request */
        $request = $pendingRequest->getRequest();
        $list = [];
        $extInfo = [];
        /** @var OrderToCancel $order */
        foreach ($this->orders as $order) {
            $list[] = [
                'category' => $request->category->value,
                'symbol' => $order->symbol,
                'orderId' => $order->orderId,
                'orderLinkId' => $order->orderId,
            ];
            $extInfo[] = [
                'code' => 0,
                'msg' => 'OK',
            ];
        }

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'list' => $list,
            ],
            'retExtInfo' => [
                'list' => $extInfo,
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
            'Date' => 'Fri, 31 Jan 2025 22:04:32 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '20',
            'X-Bapi-Limit-Status' => '18',
            'X-Bapi-Limit-Reset-Timestamp' => '1738361072974',
            'Ret_code' => '0',
            'Traceid' => '43a7b96103ad325b04528b5cb9245ba9',
            'Timenow' => '1738361072975',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 47c1359807d43ce291253d0840c23364.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'CI5qVNJ28HaPTLe5T7FQhzHovu_hjbZjtRYuUlc3hdAiEJogoxF32w==',
        ];
    }
}
