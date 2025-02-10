<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertCoinList;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => '"',
            'result' => [
                'coins' => [
                    0 => [
                        'coin' => 'MATIC',
                        'fullName' => 'MATIC',
                        'icon' => 'https://s1.bycsi.com/app/assets/token/0552ae79c535c3095fa18f7b377dd2e9.svg',
                        'iconNight' => 'https://t1.bycsi.com/app/assets/token/f59301aef2d6ac2165c4c4603e672fb4.svg',
                        'accuracyLength' => 8,
                        'coinType' => 'crypto',
                        'balance' => '',
                        'uBalance' => '',
                        'timePeriod' => 0,
                        'singleFromMinLimit' => '3',
                        'singleFromMaxLimit' => '7500',
                        'singleToMinLimit' => '0',
                        'singleToMaxLimit' => '0',
                        'dailyFromMinLimit' => '0',
                        'dailyFromMaxLimit' => '0',
                        'dailyToMinLimit' => '0',
                        'dailyToMaxLimit' => '0',
                        'disableFrom' => false,
                        'disableTo' => false,
                    ],
                    1 => [
                        'coin' => 'BRL',
                        'fullName' => 'BRL',
                        'icon' => 'https://t1.bycsi.com/common-static/wove/fiat-admin/2023-5-5/Tyoe=BRL.svg',
                        'iconNight' => 'https://t1.bycsi.com/app/assets/token/4b07789db27335abe6c673cd0a0474e7.svg',
                        'accuracyLength' => 2,
                        'coinType' => 'fiat',
                        'balance' => '',
                        'uBalance' => '',
                        'timePeriod' => 0,
                        'singleFromMinLimit' => '5',
                        'singleFromMaxLimit' => '15400',
                        'singleToMinLimit' => '0',
                        'singleToMaxLimit' => '0',
                        'dailyFromMinLimit' => '0',
                        'dailyFromMaxLimit' => '0',
                        'dailyToMinLimit' => '0',
                        'dailyToMaxLimit' => '0',
                        'disableFrom' => false,
                        'disableTo' => false,
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
            'Content-Length' => '104084',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 18:05:58 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '30',
            'X-Bapi-Limit-Status' => '29',
            'X-Bapi-Limit-Reset-Timestamp' => '1739210758596',
            'Ret_code' => '0',
            'Traceid' => '052c3c2bc619547f7c14530738a1e110',
            'Timenow' => '1739210758630',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 f73b010838a44ddb3d7ec843a071c1ce.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '8XUMoX9cKtIvwWm--HbmMQzUerVFbU3QN0jH80IrgpelMA_h9cIs-g==',
        ];
    }
}
