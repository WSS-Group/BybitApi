<?php

namespace BybitApi\Tests\Fixtures\Bybit\Position\AddOrReduceMargin;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Position\AddOrReduceMargin $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => $request->category->value,
                'positionIdx' => $request->positionIdx?->value,
                'riskId' => 1,
                'riskLimitValue' => '2000000',
                'symbol' => $request->symbol,
                'size' => '0.100',
                'positionValue' => '7899.05000000',
                'avgPrice' => '78990.50000000',
                'liqPrice' => '71411.00',
                'bustPrice' => '71016.10',
                'markPrice' => '78990.50',
                'leverage' => '10.00',
                'autoAddMargin' => 0,
                'positionStatus' => 'Normal',
                'positionIM' => '801.35502975',
                'positionMM' => '43.40527975',
                'unrealisedPnl' => '0.0',
                'cumRealisedPnl' => '-13520.70529553',
                'takeProfit' => '0.0',
                'stopLoss' => '0.0',
                'trailingStop' => '0.0',
                'createdTime' => '1699551257471',
                'updatedTime' => '1738870479318',
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
            'Content-Length' => '603',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 06 Feb 2025 19:34:39 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1738870479317',
            'Ret_code' => '0',
            'Traceid' => '2b53297f0f8241f81112390e8a9a058d',
            'Timenow' => '1738870479318',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 0b631faf1a288a571bee18855438ce88.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'Cnk8inP_rQH2hYywYVbCQ6xNP3vN9DmYnuWtavKPaT4VZHRZVH2Fjg==',
        ];
    }
}
