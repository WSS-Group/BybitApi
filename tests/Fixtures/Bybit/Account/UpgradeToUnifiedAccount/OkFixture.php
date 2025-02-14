<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\UpgradeToUnifiedAccount;

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
                'unifiedUpdateStatus' => 'SUCCESS',
                'unifiedUpdateMsg' => null,
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
            'Content-Length' => '136',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 14:06:05 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '38ea9051d847d6b303ede052602e17a9',
            'Timenow' => '1739541965942',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2e5f15b69d5f9af75749c48642a17b50.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'RSdLK7IkjSkRNGQyZpkzGUSHpifXZjWK0gAFva_Dp31zIG8AcWZpFg==',
        ];
    }
}
