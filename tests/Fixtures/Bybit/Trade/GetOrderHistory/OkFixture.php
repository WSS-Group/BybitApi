<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\GetOrderHistory;

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
                "nextPageCursor" => "1878573146723058432%3A1738679370190%2C1878573146723058432%3A1738679370190",
                "category" => "spot",
                "list" => [
                    0 => [
                        "symbol" => "BTCUSDT",
                        "orderType" => "Limit",
                        "orderLinkId" => "1878573146723058433",
                        "slLimitPrice" => "0",
                        "orderId" => "1878573146723058432",
                        "cancelType" => "CancelByUser",
                        "avgPrice" => "",
                        "stopOrderType" => "",
                        "lastPriceOnCreated" => "",
                        "orderStatus" => "Cancelled",
                        "takeProfit" => "0",
                        "cumExecValue" => "0.00000000",
                        "smpType" => "None",
                        "triggerDirection" => 0,
                        "blockTradeId" => "",
                        "rejectReason" => "EC_PerCancelRequest",
                        "isLeverage" => "0",
                        "price" => "91000.00",
                        "orderIv" => "",
                        "createdTime" => "1738679370190",
                        "tpTriggerBy" => "",
                        "positionIdx" => 0,
                        "trailingPercentage" => "0",
                        "timeInForce" => "GTC",
                        "leavesValue" => "0",
                        "basePrice" => "98832.51",
                        "updatedTime" => "1738680220816",
                        "side" => "Buy",
                        "smpGroup" => 0,
                        "triggerPrice" => "0.00",
                        "tpLimitPrice" => "0",
                        "trailingValue" => "0",
                        "cumExecFee" => "0",
                        "slTriggerBy" => "",
                        "leavesQty" => "0",
                        "closeOnTrigger" => false,
                        "placeType" => "",
                        "cumExecQty" => "0.000000",
                        "reduceOnly" => false,
                        "activationPrice" => "0",
                        "qty" => "0.010000",
                        "stopLoss" => "0",
                        "marketUnit" => "",
                        "smpOrderId" => "",
                        "triggerBy" => "",
                    ],
                    1 => [
                        "symbol" => "BTCUSDT",
                        "orderType" => "Limit",
                        "orderLinkId" => "1878573146723058435",
                        "slLimitPrice" => "0",
                        "orderId" => "1878573146723058433",
                        "cancelType" => "CancelByUser",
                        "avgPrice" => "",
                        "stopOrderType" => "",
                        "lastPriceOnCreated" => "",
                        "orderStatus" => "Cancelled",
                        "takeProfit" => "0",
                        "cumExecValue" => "0.00000000",
                        "smpType" => "None",
                        "triggerDirection" => 0,
                        "blockTradeId" => "",
                        "rejectReason" => "EC_PerCancelRequest",
                        "isLeverage" => "0",
                        "price" => "91000.00",
                        "orderIv" => "",
                        "createdTime" => "1738679370190",
                        "tpTriggerBy" => "",
                        "positionIdx" => 0,
                        "trailingPercentage" => "0",
                        "timeInForce" => "GTC",
                        "leavesValue" => "0",
                        "basePrice" => "98832.51",
                        "updatedTime" => "1738680220816",
                        "side" => "Buy",
                        "smpGroup" => 0,
                        "triggerPrice" => "0.00",
                        "tpLimitPrice" => "0",
                        "trailingValue" => "0",
                        "cumExecFee" => "0",
                        "slTriggerBy" => "",
                        "leavesQty" => "0",
                        "closeOnTrigger" => false,
                        "placeType" => "",
                        "cumExecQty" => "0.000000",
                        "reduceOnly" => false,
                        "activationPrice" => "0",
                        "qty" => "0.010000",
                        "stopLoss" => "0",
                        "marketUnit" => "",
                        "smpOrderId" => "",
                        "triggerBy" => "",
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
            "Content-Length" => "1119",
            "Connection" => "keep-alive",
            "Date" => "Tue, 04 Feb 2025 20:48:53 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "50",
            "X-Bapi-Limit-Status" => "49",
            "X-Bapi-Limit-Reset-Timestamp" => "1738702133426",
            "Ret_code" => "0",
            "Traceid" => "40733f2a9694bbd113067cda73b52a42",
            "Timenow" => "1738702133433",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 0b631faf1a288a571bee18855438ce88.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "IHR3Nw5Q4Ouk2kx-kZ0Qs2nBxpL8mZ8oTyz11K07I4fjYv_WACoaHA==",
        ];
    }
}
