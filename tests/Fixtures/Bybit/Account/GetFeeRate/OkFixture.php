<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetFeeRate;

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
                        'symbol' => 'TAIUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    1 => [
                        'symbol' => 'EDUUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    2 => [
                        'symbol' => 'AVAILUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    3 => [
                        'symbol' => 'SOLUSDT-21FEB25',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    4 => [
                        'symbol' => 'CELOUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    5 => [
                        'symbol' => 'MEWUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    6 => [
                        'symbol' => 'BNTUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    7 => [
                        'symbol' => 'SANDUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    8 => [
                        'symbol' => 'ROSEUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
                    ],
                    9 => [
                        'symbol' => '10000LADYSUSDT',
                        'takerFeeRate' => '0.000375',
                        'makerFeeRate' => '0.00016',
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
            'Content-Length' => '39525',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 12:55:58 GMT',
            'x-cld-src' => 'Loc-T',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1739537758021',
            'Ret_code' => '0',
            'Traceid' => '11eaaf6bdf3602cb7dfe8ff12cfd0a1b',
            'Timenow' => '1739537758036',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 6f6cfad7cbccfc294ba741d88889e5f6.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'edLJyxU4vI7F3h2401cqhVmnT5EYooxMECYsE7tuc5rN167IrRnJRg==',
        ];
    }
}
