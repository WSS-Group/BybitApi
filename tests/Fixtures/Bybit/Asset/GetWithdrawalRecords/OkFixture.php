<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetWithdrawalRecords;

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
                'rows' => [
                    0 => [
                        'coin' => 'USDT',
                        'chain' => 'ETH',
                        'amount' => '77',
                        'txID' => '',
                        'status' => 'SecurityCheck',
                        'toAddress' => '0x99ced129603abc771c0dabe935c326ff6c86645d',
                        'tag' => '',
                        'withdrawFee' => '10',
                        'createTime' => '1670922217000',
                        'updateTime' => '1670922217000',
                        'withdrawId' => '9976',
                        'withdrawType' => 0,
                    ],
                    1 => [
                        'coin' => 'USDT',
                        'chain' => 'internalAddressChain',
                        'amount' => '20.1234',
                        'txID' => '',
                        'status' => 'success',
                        'toAddress' => '999805',
                        'tag' => '',
                        'withdrawFee' => '0',
                        'createTime' => '1698889833000',
                        'updateTime' => '1698889846000',
                        'withdrawId' => '13310',
                        'withdrawType' => 1,
                    ],
                ],
                'nextPageCursor' => 'eyJtaW5JRCI6MjMyMDIxODE2LCJtYXhJRCI6MjMyMTExNTc0fQ==',
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
            'Content-Length' => '110',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 17:08:32 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '300',
            'X-Bapi-Limit-Status' => '299',
            'X-Bapi-Limit-Reset-Timestamp' => '1739207312677',
            'Ret_code' => '0',
            'Traceid' => '6c000a292ddf2482498d2285525e3043',
            'Timenow' => '1739207312681',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 0b631faf1a288a571bee18855438ce88.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'khcC3qfGgufarCOoTAoqB9CuxStHmmVl2TULTQn052yrr1ykY2_p-g==',
        ];
    }
}
