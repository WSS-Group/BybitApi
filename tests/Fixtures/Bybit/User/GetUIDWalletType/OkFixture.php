<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\GetUIDWalletType;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => '',
            'result' => [
                'accounts' => [
                    0 => [
                        'uid' => '23132131',
                        'accountType' => [
                            0 => 'UNIFIED',
                            1 => 'FUND',
                            2 => 'CONTRACT',
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
            'Content-Length' => '150',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 17:12:26 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1739466746792',
            'Ret_code' => '0',
            'Traceid' => '0c4fa249187d3cc4261586022018919f',
            'Timenow' => '1739466746800',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 20258a2b3c6766e357360ce1a55204c8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'VLcgvlG2Y4gTmlYHqfNnof15wyRKzlOkJvX1NLllAl-l2xUbyDtqYA==',
        ];
    }
}
