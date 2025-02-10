<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetInternalTransferRecords;

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
                'list' => [
                    0 => [
                        'transferId' => '016e8bda-bff9-49f1-9f4e-0d7f0a86850b',
                        'coin' => 'BTC',
                        'amount' => '0.5',
                        'fromAccountType' => 'FUND',
                        'toAccountType' => 'UNIFIED',
                        'timestamp' => strval($current->startOfDay()->getTimestampMs()),
                        'status' => 'SUCCESS',
                    ],
                    1 => [
                        'transferId' => 'selfTransfer_4a0e5b2c-b50a-48ec-9217-195f6e31afa2',
                        'coin' => 'USDT',
                        'amount' => '10000',
                        'fromAccountType' => 'FUND',
                        'toAccountType' => 'UNIFIED',
                        'timestamp' => strval($current->startOfDay()->getTimestampMs()),
                        'status' => 'SUCCESS',
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
            'Content-Length' => '537',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 14:36:46 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '60',
            'X-Bapi-Limit-Status' => '59',
            'X-Bapi-Limit-Reset-Timestamp' => '1739198206377',
            'Ret_code' => '0',
            'Traceid' => '321621bc8f79813e65274834631ea6ab',
            'Timenow' => '1739198206389',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 4b0e0d109fbe174b2ad1b00f1e25c2fa.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'nW-Pdq07laI7c-bxlmv6LAXn8f87iDYXWzZjjzuKUaNzS4khjyt-xA==',
        ];
    }
}
