<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetWalletBalance;

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
                'list' => [
                    0 => [
                        'totalEquity' => '58070.11059301',
                        'accountIMRate' => '',
                        'totalMarginBalance' => '',
                        'totalInitialMargin' => '',
                        'accountType' => 'UNIFIED',
                        'totalAvailableBalance' => '',
                        'accountMMRate' => '',
                        'totalPerpUPL' => '0',
                        'totalWalletBalance' => '58070.11059301',
                        'accountLTV' => '',
                        'totalMaintenanceMargin' => '',
                        'coin' => [
                            0 => [
                                'availableToBorrow' => '',
                                'bonus' => '0',
                                'accruedInterest' => '0',
                                'availableToWithdraw' => '',
                                'totalOrderIM' => '0',
                                'equity' => '0.51474281',
                                'totalPositionMM' => '0',
                                'usdValue' => '49731.4233756',
                                'unrealisedPnl' => '0',
                                'collateralSwitch' => true,
                                'spotHedgingQty' => '0',
                                'borrowAmount' => '0',
                                'totalPositionIM' => '0',
                                'walletBalance' => '0.51474281',
                                'cumRealisedPnl' => '-0.00001018',
                                'locked' => '0',
                                'marginCollateral' => true,
                                'coin' => 'BTC',
                            ],
                            1 => [
                                'availableToBorrow' => '',
                                'bonus' => '0',
                                'accruedInterest' => '0',
                                'availableToWithdraw' => '',
                                'totalOrderIM' => '0',
                                'equity' => '8336.8697798',
                                'totalPositionMM' => '0',
                                'usdValue' => '8338.68721741',
                                'unrealisedPnl' => '0',
                                'collateralSwitch' => true,
                                'spotHedgingQty' => '0',
                                'borrowAmount' => '0',
                                'totalPositionIM' => '0',
                                'walletBalance' => '8336.8697798',
                                'cumRealisedPnl' => '-12035.15776561',
                                'locked' => '0',
                                'marginCollateral' => true,
                                'coin' => 'USDT',
                            ],
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
            'Content-Length' => '1153',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 13:30:27 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739539827174',
            'Ret_code' => '0',
            'Traceid' => '4cf6561a1fee6e9e1823c5bf876fce24',
            'Timenow' => '1739539827176',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 4b0e0d109fbe174b2ad1b00f1e25c2fa.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '6Dvx2OTsA-QVM1Pbe2wUPGaj5vjxy15J3Q9U2VEzreaW6A7vnpJR9w==',
        ];
    }
}
