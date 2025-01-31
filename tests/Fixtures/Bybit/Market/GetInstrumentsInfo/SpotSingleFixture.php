<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class SpotSingleFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => 'spot',
                'list' => [
                    [
                        'symbol' => 'BTCUSDT',
                        'baseCoin' => 'BTC',
                        'quoteCoin' => 'USDT',
                        'innovation' => '0',
                        'status' => 'Trading',
                        'marginTrading' => 'utaOnly',
                        'stTag' => '0',
                        'lotSizeFilter' => [
                            'basePrecision' => '0.000001',
                            'quotePrecision' => '0.00000001',
                            'minOrderQty' => '0.000048',
                            'maxOrderQty' => '100',
                            'minOrderAmt' => '5',
                            'maxOrderAmt' => '8000000',
                        ],
                        'priceFilter' => [
                            'tickSize' => '0.01',
                        ],
                        'riskParameters' => [
                            'priceLimitRatioX' => '0.1',
                            'priceLimitRatioY' => '0.1',
                        ],
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
            'Content-Length' => '498',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 29 Jan 2025 17:51:23 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '273667ec0fd1846a50d7a665d537a542',
            'Timenow' => '1738173083580',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e3a3c8a0ec7b3e46dacb56f83c6dc628.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '0DB6XQDmLVUAsr5Zd67vQydX5mpJpwZOEIQkuDier30c7NE3DYrnRQ==',
        ];
    }
}
