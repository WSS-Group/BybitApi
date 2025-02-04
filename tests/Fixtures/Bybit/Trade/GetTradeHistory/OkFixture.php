<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\GetTradeHistory;

use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Tests\Fixtures\Fixture;
use Illuminate\Support\Collection;
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
                "nextPageCursor" => "1738265305554%3A703536%2C1738265305554%3A703535",
                "category" => "spot",
                "list" => [
                    0 => [
                        "symbol" => "BTCUSDT",
                        "orderType" => "Market",
                        "underlyingPrice" => "",
                        "orderLinkId" => "1875099720804991746",
                        "orderId" => "1875099720804991745",
                        "stopOrderType" => "",
                        "execTime" => "1738265305554",
                        "feeCurrency" => "BTC",
                        "feeRate" => "0.000775",
                        "tradeIv" => "",
                        "blockTradeId" => "",
                        "markPrice" => "",
                        "execPrice" => "104747.81",
                        "markIv" => "",
                        "orderQty" => "0",
                        "orderPrice" => "115012.34",
                        "execValue" => "9.63679852",
                        "closedSize" => "",
                        "execType" => "Trade",
                        "seq" => 1562292162,
                        "side" => "Buy",
                        "indexPrice" => "",
                        "leavesQty" => "0",
                        "isMaker" => false,
                        "execFee" => "0.0000000713",
                        "execId" => "2100000000132022453",
                        "marketUnit" => "quoteCoin",
                        "execQty" => "0.000092",
                    ],
                    1 => [
                        "symbol" => "BTCUSDT",
                        "orderType" => "Market",
                        "underlyingPrice" => "",
                        "orderLinkId" => "1875099720804991746",
                        "orderId" => "1875099720804991745",
                        "stopOrderType" => "",
                        "execTime" => "1738265305554",
                        "feeCurrency" => "BTC",
                        "feeRate" => "0.000775",
                        "tradeIv" => "",
                        "blockTradeId" => "",
                        "markPrice" => "",
                        "execPrice" => "104721.05",
                        "markIv" => "",
                        "orderQty" => "0",
                        "orderPrice" => "115012.34",
                        "execValue" => "10.2626629",
                        "closedSize" => "",
                        "execType" => "Trade",
                        "seq" => 1562292162,
                        "side" => "Buy",
                        "indexPrice" => "",
                        "leavesQty" => "0",
                        "isMaker" => false,
                        "execFee" => "0.00000007595",
                        "execId" => "2100000000132022452",
                        "marketUnit" => "quoteCoin",
                        "execQty" => "0.000098",
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
            "Content-Type" => "application/json; charset=utf-8",
            "Content-Length" => "1330",
            "Connection" => "keep-alive",
            "Date" => "Tue, 04 Feb 2025 21:31:13 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "50",
            "X-Bapi-Limit-Status" => "49",
            "X-Bapi-Limit-Reset-Timestamp" => "1738704673708",
            "Ret_code" => "0",
            "Traceid" => "21b60d585fd4eee772d0277c70821940",
            "Timenow" => "1738704673716",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 94e3ea0ab5975966bae06782503f9692.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "sw5rvcNMJ8IfHQQ-8AbTUXCycClnnS5RfMI7kbeqVeyJq5Bw5CP48g==",
        ];
    }
}
