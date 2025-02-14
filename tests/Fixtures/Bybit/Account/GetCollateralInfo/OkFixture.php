<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetCollateralInfo;

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
                        'availableToBorrow' => '4500',
                        'freeBorrowingAmount' => '',
                        'freeBorrowAmount' => '0',
                        'maxBorrowingAmount' => '4500',
                        'hourlyBorrowRate' => '0.0000815',
                        'borrowUsageRate' => '0',
                        'collateralSwitch' => true,
                        'borrowAmount' => '0',
                        'borrowable' => true,
                        'currency' => 'BUSD',
                        'otherBorrowAmount' => '0',
                        'marginCollateral' => true,
                        'freeBorrowingLimit' => '0',
                        'collateralRatio' => '0.0065,',
                    ],
                    1 => [
                        'availableToBorrow' => '225',
                        'freeBorrowingAmount' => '',
                        'freeBorrowAmount' => '0',
                        'maxBorrowingAmount' => '225',
                        'hourlyBorrowRate' => '0.00032414',
                        'borrowUsageRate' => '0',
                        'collateralSwitch' => true,
                        'borrowAmount' => '0',
                        'borrowable' => true,
                        'currency' => 'APT',
                        'otherBorrowAmount' => '0',
                        'marginCollateral' => true,
                        'freeBorrowingLimit' => '0',
                        'collateralRatio' => '0.25',
                    ],
                    2 => [
                        'availableToBorrow' => '0',
                        'freeBorrowingAmount' => '',
                        'freeBorrowAmount' => '0',
                        'maxBorrowingAmount' => '0',
                        'hourlyBorrowRate' => '0.00012273',
                        'borrowUsageRate' => '0',
                        'collateralSwitch' => false,
                        'borrowAmount' => '0',
                        'borrowable' => true,
                        'currency' => 'BTC',
                        'otherBorrowAmount' => '0',
                        'marginCollateral' => true,
                        'freeBorrowingLimit' => '0',
                        'collateralRatio' => '0.99',
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
            'Content-Length' => '12095',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 13:17:23 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739539043162',
            'Ret_code' => '0',
            'Traceid' => '3b8b09ee76f8b3c910e429ab25ca44a2',
            'Timenow' => '1739539043165',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 0b631faf1a288a571bee18855438ce88.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'zIzSNZkp_waxTYpPtxHjpNx3JfeJyNkW-RzKpmWiYaSxljeaqvtR5Q==',
        ];
    }
}
