<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetSmpGroupId;

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
                'smpGroup' => 0,
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
            'Content-Length' => '93',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 17:23:44 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739553824308',
            'Ret_code' => '0',
            'Traceid' => '3ec14e460ec20b8b1b1f20ca946a9b65',
            'Timenow' => '1739553824315',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 a9099ea1e29fa928ad562a5af3831b88.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'RlaLC31kewiOUkmLm_3VzjC-HELmLPuWQRzKVMOV8WI-_bkuJgN-NQ==',
        ];
    }
}
