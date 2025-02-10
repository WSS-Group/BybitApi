<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetUniversalTransferRecords;

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
                        'transferId' => '874f2fea-a35d-459c-8780-578ba00183ee',
                        'coin' => 'BTC',
                        'amount' => '0.16',
                        'timestamp' => strval($current->startOfDay()->getTimestampMs()),
                        'status' => 'SUCCESS',
                        'fromAccountType' => 'FUND',
                        'toAccountType' => 'FUND',
                        'fromMemberId' => '100398343',
                        'toMemberId' => '100400842',
                    ],
                    1 => [
                        'transferId' => '669e368a-138b-4320-91aa-b28f8cce3a14',
                        'coin' => 'BTC',
                        'amount' => '0.16',
                        'timestamp' => strval($current->startOfDay()->getTimestampMs()),
                        'status' => 'SUCCESS',
                        'fromAccountType' => 'FUND',
                        'toAccountType' => 'FUND',
                        'fromMemberId' => '100398343',
                        'toMemberId' => '100400842',
                    ],
                ],
                'nextPageCursor' => 'eyJtaW5JRCI6MjMyMTExOTMyLCJtYXhJRCI6MjMyMTExOTM4fQ==',
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
            'Content-Length' => '621',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 15:59:32 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739203172222',
            'Ret_code' => '0',
            'Traceid' => '67e070db746e118d3cf83dc191791da0',
            'Timenow' => '1739203172241',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2268373f32ed46c458ef5057fc6f60f8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'gzCT1nRSCRbVU3h6Z6LHmyb3AOlnKk-cZeCNlvdmAyGF3VaSnSMPpw==',
        ];
    }
}
