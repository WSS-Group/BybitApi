<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo;

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
                    [
                        'symbol' => 'BTC-26DEC25-260000-P',
                        'status' => 'Trading',
                        'baseCoin' => 'BTC',
                        'quoteCoin' => 'USDC',
                        'settleCoin' => 'USDC',
                        'optionsType' => 'Put',
                        'launchTime' => '1736409600000',
                        'deliveryTime' => '1766736000000',
                        'deliveryFeeRate' => '0.00015',
                        'priceFilter' => [
                            'minPrice' => '5',
                            'maxPrice' => '10000000',
                            'tickSize' => '5',
                        ],
                        'lotSizeFilter' => [
                            'maxOrderQty' => '10000',
                            'minOrderQty' => '0.01',
                            'qtyStep' => '0.01',
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
            'Content-Length' => '492',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 29 Jan 2025 17:55:01 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '2e5c189b9a8a369d6fd600b0a75aaf45',
            'Timenow' => '1738173301596',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'AirT3CaeKhrQyTWcihh8kXPGZE5oG4OFi9K31aJssDt-1wOqv00SEg==',
        ];
    }
}
