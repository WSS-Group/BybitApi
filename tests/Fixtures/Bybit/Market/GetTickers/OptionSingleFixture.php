<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetTickers;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OptionSingleFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => 'option',
                'list' => [
                    0 => [
                        'symbol' => 'BTC-28MAR25-80000-C',
                        'bid1Price' => '0',
                        'bid1Size' => '0',
                        'bid1Iv' => '0',
                        'ask1Price' => '0',
                        'ask1Size' => '0',
                        'ask1Iv' => '0',
                        'lastPrice' => '28590',
                        'highPrice24h' => '0',
                        'lowPrice24h' => '0',
                        'markPrice' => '26055.61315364',
                        'indexPrice' => '101679.86114951',
                        'markIv' => '0.745',
                        'underlyingPrice' => '103172.65',
                        'openInterest' => '7.96',
                        'turnover24h' => '0',
                        'volume24h' => '0',
                        'totalVolume' => '10',
                        'totalTurnover' => '606394',
                        'delta' => '0.84325656',
                        'gamma' => '0.00000787',
                        'vega' => '98.3293379',
                        'theta' => '-63.66095409',
                        'predictedDeliveryPrice' => '0',
                        'change24h' => '0',
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
            'Content-Length' => '624',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 29 Jan 2025 19:11:36 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '2f7e23216194ee1d352cf66b68418692',
            'Timenow' => '1738177896935',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'KmFbAnrTSMRgGd8pDv_nEADcrVh9v62LFwHdOyVEG_i9J28Aut8Ktg==',
        ];
    }
}
