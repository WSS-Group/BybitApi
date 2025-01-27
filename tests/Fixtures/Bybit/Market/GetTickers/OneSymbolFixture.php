<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetTickers;

use BybitApi\Tests\Fixtures\Fixture;

class OneSymbolFixture extends Fixture
{
    public function body(): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => 'inverse',
                'list' => [
                    0 => [
                        'symbol' => 'BTCUSDT',
                        'lastPrice' => '95134.50',
                        'indexPrice' => '99601.23',
                        'markPrice' => '95134.50',
                        'prevPrice24h' => '99992.80',
                        'price24hPcnt' => '-0.048586',
                        'highPrice24h' => '99992.80',
                        'lowPrice24h' => '83746.60',
                        'prevPrice1h' => '96095.40',
                        'openInterest' => '966263.789',
                        'openInterestValue' => '91925022434.62',
                        'turnover24h' => '1501353730.5948',
                        'volume24h' => '15379.8140',
                        'fundingRate' => '-0.00375',
                        'nextFundingTime' => '1738022400000',
                        'predictedDeliveryPrice' => '',
                        'basisRate' => '',
                        'deliveryFeeRate' => '',
                        'deliveryTime' => '0',
                        'ask1Size' => '956.343',
                        'bid1Price' => '94960.00',
                        'ask1Price' => '95134.50',
                        'bid1Size' => '0.001',
                        'basis' => '',
                        'preOpenPrice' => '',
                        'preQty' => '',
                        'curPreListingPhase' => '',
                    ],
                ],
            ],
            'retExtInfo' => [],
            'time' => $current->getTimestampMs(),
        ];
    }

    public function status(): int
    {
        return 200;
    }

    public function headers(): array
    {
        return [
            'Content-Type' => 'application/json; charset=utf-8',
            'Content-Length' => '739',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 27 Jan 2025 19:26:30 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '02c84e83121b10d4379e2858af4a0561',
            'Timenow' => '1738005990820',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 db1c92883e5a30c4b63df61f06c88a24.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU1-C1',
            'X-Amz-Cf-Id' => 'V9NB2Byyd-mI92XE5iOWo2DDsHRR-Zpq9UltbO5q6AlVz-HkUMUBwg==',
        ];
    }
}
