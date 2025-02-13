<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\DeleteMasterApiKey;

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
            'result' => [],
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
            'Content-Length' => '74',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 18:17:26 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739470646398',
            'Ret_code' => '0',
            'Traceid' => '0bc2685c0385f7537fbe79eec118388b',
            'Timenow' => '1739470646413',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '3QSpFzzwJym09orocBmd9YxLINuoRLyu_60IN885U5A44xDpGKs-PQ==',
        ];
    }
}
