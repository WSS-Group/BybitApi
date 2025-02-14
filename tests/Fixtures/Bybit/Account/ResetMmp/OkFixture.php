<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\ResetMmp;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {

        return [
            'retCode' => 0,
            'retMsg' => 'SUCCESS',
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
            'Content-Length' => '32',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 17:45:16 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '77057e84e9fd80a961f38547b41f32a4',
            'Timenow' => '1739555116568',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 a13739d34a59cbb00bd3fbf3a185a584.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '0NNNmRJPOEPIWMdGKboHqQBcwgdM9kYIMvLkZYt1PMS_zYanOPvHTA==',
        ];
    }
}
