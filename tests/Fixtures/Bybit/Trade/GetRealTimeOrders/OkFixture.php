<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\GetRealTimeOrders;

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
                'nextPageCursor' => '1878700750050427648%3A1738694581692%2C1878700750050427648%3A1738694581692',
                'category' => 'spot',
                'list' => [
                    0 => [
                        'symbol' => 'BTCUSDT',
                        'orderType' => 'Limit',
                        'orderLinkId' => '1878700750050427649',
                        'slLimitPrice' => '0',
                        'orderId' => '1878700750050427648',
                        'cancelType' => 'UNKNOWN',
                        'avgPrice' => '0.00',
                        'stopOrderType' => '',
                        'lastPriceOnCreated' => '',
                        'orderStatus' => 'New',
                        'takeProfit' => '0',
                        'cumExecValue' => '0.00000000',
                        'smpType' => 'None',
                        'triggerDirection' => 0,
                        'blockTradeId' => '',
                        'isLeverage' => '0',
                        'rejectReason' => 'EC_NoError',
                        'price' => '90000.00',
                        'orderIv' => '',
                        'createdTime' => '1738694581692',
                        'tpTriggerBy' => '',
                        'positionIdx' => 0,
                        'trailingPercentage' => '0',
                        'timeInForce' => 'GTC',
                        'leavesValue' => '900.00000000',
                        'basePrice' => '96900.95',
                        'updatedTime' => '1738694581696',
                        'side' => 'Buy',
                        'smpGroup' => 0,
                        'triggerPrice' => '0.00',
                        'tpLimitPrice' => '0',
                        'trailingValue' => '0',
                        'cumExecFee' => '0',
                        'leavesQty' => '0.010000',
                        'slTriggerBy' => '',
                        'closeOnTrigger' => false,
                        'placeType' => '',
                        'cumExecQty' => '0.000000',
                        'reduceOnly' => false,
                        'activationPrice' => '0',
                        'qty' => '0.010000',
                        'stopLoss' => '0',
                        'marketUnit' => '',
                        'smpOrderId' => '',
                        'triggerBy' => '',
                    ],
                    1 => [
                        'symbol' => 'BTCUSDT',
                        'orderType' => 'Limit',
                        'orderLinkId' => '1878700750050427650',
                        'slLimitPrice' => '0',
                        'orderId' => '1878700750050427649',
                        'cancelType' => 'UNKNOWN',
                        'avgPrice' => '0.00',
                        'stopOrderType' => '',
                        'lastPriceOnCreated' => '',
                        'orderStatus' => 'New',
                        'takeProfit' => '0',
                        'cumExecValue' => '0.00000000',
                        'smpType' => 'None',
                        'triggerDirection' => 0,
                        'blockTradeId' => '',
                        'isLeverage' => '0',
                        'rejectReason' => 'EC_NoError',
                        'price' => '90000.00',
                        'orderIv' => '',
                        'createdTime' => '1738694581692',
                        'tpTriggerBy' => '',
                        'positionIdx' => 0,
                        'trailingPercentage' => '0',
                        'timeInForce' => 'GTC',
                        'leavesValue' => '900.00000000',
                        'basePrice' => '96900.95',
                        'updatedTime' => '1738694581696',
                        'side' => 'Buy',
                        'smpGroup' => 0,
                        'triggerPrice' => '0.00',
                        'tpLimitPrice' => '0',
                        'trailingValue' => '0',
                        'cumExecFee' => '0',
                        'leavesQty' => '0.010000',
                        'slTriggerBy' => '',
                        'closeOnTrigger' => false,
                        'placeType' => '',
                        'cumExecQty' => '0.000000',
                        'reduceOnly' => false,
                        'activationPrice' => '0',
                        'qty' => '0.010000',
                        'stopLoss' => '0',
                        'marketUnit' => '',
                        'smpOrderId' => '',
                        'triggerBy' => '',
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
            'Content-Length' => '1121',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 04 Feb 2025 19:47:16 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1738698436322',
            'Ret_code' => '0',
            'Traceid' => '45bf70e9faec46204802bdc15b7b6ee6',
            'Timenow' => '1738698436325',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e3a3c8a0ec7b3e46dacb56f83c6dc628.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '5heK0XhwidOsTy4x23HFfBabo-8f8fMQT1PmNkqjcdhVe-SlA7FoQQ==',
        ];
    }
}
