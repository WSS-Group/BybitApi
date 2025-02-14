<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetTransferableAmount;

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
                'availableWithdrawal' => '8336.86977980',
                'availableWithdrawalMap' => [
                    'USDT' => '8336.86977980',
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
            'Content-Length' => '163',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 13:53:31 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739541211247',
            'Ret_code' => '0',
            'Traceid' => '16ee09f7baf2a13059d8209126aff638',
            'Timenow' => '1739541211254',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 e3a3c8a0ec7b3e46dacb56f83c6dc628.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'zJ3H8O2Vb_gzS9QUlEvAdSoODDIFWgyN7Q7w6Y6VHDZhwEDzdpHRzQ==',
        ];
    }
}
