<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\GetClosedPNL;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'nextPageCursor' => 'c2040a63-4ef7-4561-bd38-0c74417b50a7%3A1738868082330%2C6bb2f935-f119-46c5-9644-7944609f6984%3A1738780785906',
                'category' => 'linear',
                'list' => [
                    0 => [
                        'symbol' => 'BTCUSDT',
                        'orderType' => 'Market',
                        'leverage' => '10',
                        'updatedTime' => '1738868082330',
                        'side' => 'Sell',
                        'orderId' => 'c2040a63-4ef7-4561-bd38-0c74417b50a7',
                        'closedPnl' => '50.93418803',
                        'avgEntryPrice' => '74283.9',
                        'qty' => '0.009',
                        'cumEntryValue' => '668.5551',
                        'createdTime' => '1738868082326',
                        'orderPrice' => '79788.3',
                        'closedSize' => '0.009',
                        'avgExitPrice' => '80001.1111',
                        'execType' => 'Trade',
                        'fillCount' => '3',
                        'cumExitValue' => '720.01',
                    ],
                    1 => [
                        'symbol' => 'BTCUSDT',
                        'orderType' => 'Market',
                        'leverage' => '10',
                        'updatedTime' => '1738868076247',
                        'side' => 'Sell',
                        'orderId' => '250bf921-0ab3-4afb-9a4c-8341dfeb9e89',
                        'closedPnl' => '64.93120189',
                        'avgEntryPrice' => '74283.9',
                        'qty' => '0.022',
                        'cumEntryValue' => '965.6907',
                        'createdTime' => '1738868076243',
                        'orderPrice' => '79200',
                        'closedSize' => '0.013',
                        'avgExitPrice' => '79336.2153',
                        'execType' => 'Trade',
                        'fillCount' => '8',
                        'cumExitValue' => '1031.3708',
                    ],
                    2 => [
                        'symbol' => 'BTCUSDT',
                        'orderType' => 'Market',
                        'leverage' => '10',
                        'updatedTime' => '1738868069563',
                        'side' => 'Sell',
                        'orderId' => '65691f06-c4fc-4398-9aec-6552f53cba85',
                        'closedPnl' => '50.92419182',
                        'avgEntryPrice' => '74283.9',
                        'qty' => '0.031',
                        'cumEntryValue' => '668.5551',
                        'createdTime' => '1738868069559',
                        'orderPrice' => '79788.3',
                        'closedSize' => '0.009',
                        'avgExitPrice' => '80000',
                        'execType' => 'Trade',
                        'fillCount' => '2',
                        'cumExitValue' => '720',
                    ],
                ],
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
            'Content-Length' => '6679',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 19:45:45 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1738871145796',
            'Ret_code' => '0',
            'Traceid' => '433b214bb3d15e7f06ddf85e66527adb',
            'Timenow' => '1738871145807',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'ZKLW244z7-yfTb4lZ9NBaey5Ghmcc6R3ncQfDejQyRQFVQZ1Gn_rag==',
        ];
    }
}
