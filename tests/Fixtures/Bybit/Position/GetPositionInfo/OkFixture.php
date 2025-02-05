<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\GetPositionInfo;

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
                'nextPageCursor' => 'BTCUSDT%2C1738262970411%2C2',
                'category' => 'linear',
                'list' => [
                    0 => [
                        'symbol' => $request->symbol,
                        'leverage' => '10',
                        'autoAddMargin' => 0,
                        'avgPrice' => '98378.84642857',
                        'liqPrice' => '',
                        'riskLimitValue' => '2000000',
                        'takeProfit' => '',
                        'positionValue' => '2065.95577501',
                        'isReduceOnly' => false,
                        'tpslMode' => 'Full',
                        'riskId' => 1,
                        'trailingStop' => '0',
                        'unrealisedPnl' => '-38.02903501',
                        'markPrice' => '96567.94',
                        'adlRankIndicator' => 2,
                        'cumRealisedPnl' => '-14034.45103195',
                        'positionMM' => '11.35242699',
                        'createdTime' => '1699551257471',
                        'positionIdx' => 1,
                        'positionIM' => '207.61822561',
                        'seq' => 9426828157,
                        'updatedTime' => '1738780785906',
                        'side' => 'Buy',
                        'bustPrice' => '',
                        'positionBalance' => '0',
                        'leverageSysUpdatedTime' => '',
                        'curRealisedPnl' => '-7.71579418',
                        'size' => '0.021',
                        'positionStatus' => 'Normal',
                        'mmrSysUpdatedTime' => '',
                        'stopLoss' => '',
                        'tradeMode' => 0,
                        'sessionAvgPrice' => '',
                    ],
                    1 => [
                        'symbol' => $request->symbol,
                        'leverage' => '10',
                        'autoAddMargin' => 0,
                        'avgPrice' => '0',
                        'liqPrice' => '',
                        'riskLimitValue' => '2000000',
                        'takeProfit' => '',
                        'positionValue' => '',
                        'isReduceOnly' => false,
                        'tpslMode' => 'Full',
                        'riskId' => 1,
                        'trailingStop' => '0',
                        'unrealisedPnl' => '',
                        'markPrice' => '96567.94',
                        'adlRankIndicator' => 0,
                        'cumRealisedPnl' => '2256.02919617',
                        'positionMM' => '0',
                        'createdTime' => '1699551257471',
                        'positionIdx' => 2,
                        'positionIM' => '0',
                        'seq' => 9397445975,
                        'updatedTime' => '1738262970411',
                        'side' => '',
                        'bustPrice' => '',
                        'positionBalance' => '0',
                        'leverageSysUpdatedTime' => '',
                        'curRealisedPnl' => '0',
                        'size' => '0',
                        'positionStatus' => 'Normal',
                        'mmrSysUpdatedTime' => '',
                        'stopLoss' => '',
                        'tradeMode' => 0,
                        'sessionAvgPrice' => '',
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
            'Content-Length' => '1515',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 05 Feb 2025 18:46:44 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1738781204552',
            'Ret_code' => '0',
            'Traceid' => '7cdb72d9fc51608f3a048c299973d2f3',
            'Timenow' => '1738781204554',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 d1f8b34c042c93e727a98fcf27ef69d8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'Zqlxx7TqjROcEZmC1NB1bFGYV_9osMj6MTY1BQVVKfD_xwUsZiI8iw==',
        ];
    }
}
