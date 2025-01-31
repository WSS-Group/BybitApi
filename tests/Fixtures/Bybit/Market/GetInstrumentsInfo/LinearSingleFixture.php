<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetInstrumentsInfo;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class LinearSingleFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => 'linear',
                'list' => [
                    [
                        'symbol' => 'BTCUSDT',
                        'contractType' => 'LinearPerpetual',
                        'status' => 'Trading',
                        'baseCoin' => 'BTC',
                        'quoteCoin' => 'USDT',
                        'launchTime' => '1585526400000',
                        'deliveryTime' => '0',
                        'deliveryFeeRate' => '',
                        'priceScale' => '2',
                        'leverageFilter' => [
                            'minLeverage' => '1',
                            'maxLeverage' => '100.00',
                            'leverageStep' => '0.01',
                        ],
                        'priceFilter' => [
                            'minPrice' => '0.10',
                            'maxPrice' => '1999999.80',
                            'tickSize' => '0.10',
                        ],
                        'lotSizeFilter' => [
                            'maxOrderQty' => '1190.000',
                            'minOrderQty' => '0.001',
                            'qtyStep' => '0.001',
                            'postOnlyMaxOrderQty' => '1190.000',
                            'maxMktOrderQty' => '500.000',
                            'minNotionalValue' => '5',
                        ],
                        'unifiedMarginTrade' => true,
                        'fundingInterval' => 480,
                        'settleCoin' => 'USDT',
                        'copyTrading' => 'both',
                        'upperFundingRate' => '0.00375',
                        'lowerFundingRate' => '-0.00375',
                        'isPreListing' => false,
                        'preListingInfo' => [
                            'curAuctionPhase' => 'ContinuousTrading',
                            'phases' => [
                                [
                                    'phase' => 'CallAuction',
                                    'startTime' => '1735113600000',
                                    'endTime' => '1735116600000',
                                ],
                                [
                                    'phase' => 'CallAuctionNoCancel',
                                    'startTime' => '1735116600000',
                                    'endTime' => '1735116900000',
                                ],
                                [
                                    'phase' => 'CrossMatching',
                                    'startTime' => '1735116900000',
                                    'endTime' => '1735117200000',
                                ],
                                [
                                    'phase' => 'ContinuousTrading',
                                    'startTime' => '1735117200000',
                                    'endTime' => '',
                                ],
                            ],
                            'auctionFeeInfo' => [
                                'auctionFeeRate' => '0',
                                'takerFeeRate' => '0.001',
                                'makerFeeRate' => '0.0004',
                            ],
                        ],
                        'riskParameters' => [
                            'priceLimitRatioX' => '0.01',
                            'priceLimitRatioY' => '0.02',
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
            'Content-Length' => '905',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 29 Jan 2025 17:56:08 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '53a1ef191b746cc26b871e6f678f8147',
            'Timenow' => '1738173368823',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 f73b010838a44ddb3d7ec843a071c1ce.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'MhSwO6msunT0P2AD_J980kpD3D_7mJz-6U1p4cCzutG2YYmcb3EGiQ==',
        ];
    }
}
