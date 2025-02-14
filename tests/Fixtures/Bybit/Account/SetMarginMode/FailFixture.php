<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\SetMarginMode;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class FailFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {

        return [
            'retCode' => 3400045,
            'retMsg' => 'Set margin mode failed',
            'result' => [
                'reasons' => [
                    0 => [
                        'reasonCode' => '3400000',
                        'reasonMsg' => 'Equity needs to be equal to or greater than 1000 USDC',
                    ],
                ],
            ],
        ];
    }

    public function status(
        PendingRequest $pendingRequest
    ): int {
        return 200;
    }

    public function headers(
        PendingRequest $pendingRequest
    ): array {
        return [
            'Content-Type' => 'application/json; charset=utf-8',
            'Content-Length' => '65',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 17:33:28 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739554408050',
            'Ret_code' => '0',
            'Traceid' => '7ecc474a54d73d7234003d999932487a',
            'Timenow' => '1739554408055',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 8cdd8206d820bb2d6bebf123c9f1ed06.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'CLwJWsaJdXoWXSNzxAr1N-j_-yuuieraoKmE8dn7ps27dJ6WG2IV-A==',
        ];
    }
}
