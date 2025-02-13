<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\ModifyMasterApiKey;

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
                'id' => '321321',
                'note' => 'Foo',
                'apiKey' => 'dadsa213',
                'readOnly' => 0,
                'secret' => '',
                'permissions' => [
                    'ContractTrade' => [
                        0 => 'Order',
                        1 => 'Position',
                    ],
                    'Spot' => [
                        0 => 'SpotTrade',
                    ],
                    'Wallet' => [
                        0 => 'AccountTransfer',
                        1 => 'SubMemberTransfer',
                    ],
                    'Options' => [
                        0 => 'OptionsTrade',
                    ],
                    'Derivatives' => [
                        0 => 'DerivativesTrade',
                    ],
                    'CopyTrading' => [],
                    'BlockTrade' => [],
                    'Exchange' => [
                        0 => 'ExchangeHistory',
                    ],
                    'NFT' => [
                        0 => 'NFTQueryProductList',
                    ],
                    'Affiliate' => [],
                ],
                'ips' => [
                    0 => '*',
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
            'Content-Length' => '464',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 17:35:02 GMT',
            'x-cld-src' => 'Loc-T',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739468102954',
            'Ret_code' => '0',
            'Traceid' => '6ea31b628db215d02e14ac9be8f19258',
            'Timenow' => '1739468102970',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 3c7e0f580e6e0538d1a02036c4045598.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'MDZ0vX8dIkyQu1YxqblKcObFNpWeXbgE8mitrhKii4c4EwsHWq7eYg==',
        ];
    }
}
