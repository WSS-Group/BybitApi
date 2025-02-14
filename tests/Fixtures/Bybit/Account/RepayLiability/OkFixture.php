<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\RepayLiability;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'SUCCESS',
            'result' => [
                'list' => [
                    0 => [
                        'coin' => 'BTC',
                        'repaymentQty' => '0.10549670',
                    ],
                    1 => [
                        'coin' => 'ETH',
                        'repaymentQty' => '2.27768114',
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
            'Content-Length' => '218',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 12:36:40 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739536600400',
            'Ret_code' => '0',
            'Traceid' => '3bfe6de284863a4d40aef352f64fb893',
            'Timenow' => '1739536600408',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 81d299a580e85cd7d4af1e1123f3282a.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'z1iPBUZPRJm5DirrUBlEmP61CTN8NFffD9OrI-UwNBIdVyFdXI7i2Q==',
        ];
    }
}
