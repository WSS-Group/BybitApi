<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\DeleteSubUID;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
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
            'Content-Length' => '76',
            'Connection' => 'keep-alive',
            'Date' => 'Tue, 11 Feb 2025 19:33:15 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739302395571',
            'Ret_code' => '0',
            'Traceid' => '70a872a0759d7de45d626912081c9aef',
            'Timenow' => '1739302395821',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 81d299a580e85cd7d4af1e1123f3282a.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'Abie-NpNr6m-4TyRtMsR-ZsjDvAKAFwxKbWYJuYqwa7cu58gumwG4Q==',
        ];
    }
}
