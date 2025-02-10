<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\CreateUniversalTransfer;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateInternalTransfer $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'success',
            'result' => [
                'transferId' => $request->transferId,
                'status' => 'SUCCESS',
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
            'Content-Length' => '151',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 15:50:30 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739202630261',
            'Ret_code' => '0',
            'Traceid' => '49cee2b3bc99bed13fc4723edaa49025',
            'Timenow' => '1739202630485',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 4b0e0d109fbe174b2ad1b00f1e25c2fa.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'cH0NS0jIS8xWtSCd4Ya-2feYgt4ZZV4Uv1UlyrDOtLaubcTrASbqfg==',
        ];
    }
}
