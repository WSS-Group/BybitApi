<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\CreateSubUIDApiKey;

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
            'result' => [
                'id' => '21321321',
                'note' => 'abc',
                'apiKey' => 'dasadsa231',
                'readOnly' => 0,
                'secret' => 'tfpSU2o4Uydadsa2321SRrgH',
                'permissions' => [
                    'ContractTrade' => [],
                    'Spot' => [],
                    'Wallet' => [],
                    'Options' => [],
                    'Derivatives' => [
                        0 => 'DerivativesTrade',
                    ],
                    'CopyTrading' => [],
                    'BlockTrade' => [],
                    'Exchange' => [],
                    'NFT' => [],
                    'Affiliate' => [],
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
            'Content-Length' => '368',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 16:34:50 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739464490127',
            'Ret_code' => '0',
            'Traceid' => '01738b893faba47d1aa87096c67e0f76',
            'Timenow' => '1739464490148',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 46162aec8cbe18641ed37c03a5a753be.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'T3V3joVLv_jGvJ6rwNJNzztTcw4bPDGYtqiiKOBFqyq9f_4aLwV6ZA==',
        ];
    }
}
