<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetTickers;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class SpotListFixture extends Fixture
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
                    0 => [
                        'symbol' => 'BTCUSDT',
                        'bid1Price' => '92431.62',
                        'bid1Size' => '0.006311',
                        'ask1Price' => '92733.08',
                        'ask1Size' => '0.000314',
                        'lastPrice' => '92733.08',
                        'prevPrice24h' => '107740.15',
                        'price24hPcnt' => '-0.1393',
                        'highPrice24h' => '112647.26',
                        'lowPrice24h' => '91780.56',
                        'turnover24h' => '5919342434.8108795',
                        'volume24h' => '60636.35098',
                        'usdIndexPrice' => '101780.741724',
                    ],
                    1 => [
                        'symbol' => 'ETHUSDT',
                        'bid1Price' => '92431.62',
                        'bid1Size' => '0.006311',
                        'ask1Price' => '92733.08',
                        'ask1Size' => '0.000314',
                        'lastPrice' => '92733.08',
                        'prevPrice24h' => '107740.15',
                        'price24hPcnt' => '-0.1393',
                        'highPrice24h' => '112647.26',
                        'lowPrice24h' => '91780.56',
                        'turnover24h' => '5919342434.8108795',
                        'volume24h' => '60636.35098',
                        'usdIndexPrice' => '101780.741724',
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
            'Content-Length' => '433',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 29 Jan 2025 19:10:21 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '20256f5e5f28561a139082d59c121b31',
            'Timenow' => '1738177821908',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 25952658d96a4bad465bab717aa8bd00.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '7PGD3aUlHCpIZQrO7IN3Nz3IEsRCaU7WRmIKqC2mECtCd5T5hxsvSw==',
        ];
    }
}
