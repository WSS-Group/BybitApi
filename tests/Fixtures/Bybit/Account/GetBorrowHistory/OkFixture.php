<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetBorrowHistory;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'success',
            'result' => [
                'nextPageCursor' => null,
                'list' => [
                    0 => [
                        'borrowAmount' => '1.06333265702840778',
                        'costExemption' => '0',
                        'freeBorrowedAmount' => '0',
                        'createdTime' => 1697439900204,
                        'InterestBearingBorrowSize' => '1.06333265702840778',
                        'currency' => 'BTC',
                        'unrealisedLoss' => '0',
                        'hourlyBorrowRate' => '0.000001216904',
                        'borrowCost' => '0.00000129',
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
            'Content-Length' => '107',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 14:32:18 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739543538950',
            'Ret_code' => '0',
            'Traceid' => '0f3f2e8559efc1b0729b2c5af300523f',
            'Timenow' => '1739543538956',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 f73b010838a44ddb3d7ec843a071c1ce.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'c9pvfAt-t6Hn1W6IxqgAm0tX9_Uym6CwJMHRDoMhqTrTSTu-6kskAA==',
        ];
    }
}
