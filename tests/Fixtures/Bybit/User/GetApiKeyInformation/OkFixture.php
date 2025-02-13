<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\GetApiKeyInformation;

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
                'id' => '2132312',
                'note' => 'Foo note',
                'apiKey' => 'dsam219u9dsajdjsa',
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
                    0 => '111.11.111.11',
                ],
                'type' => 1,
                'deadlineDay' => -2,
                'expiredAt' => '1970-01-01T00:00:00Z',
                'createdAt' => '2025-01-24T19:24:51Z',
                'unified' => 0,
                'uta' => 1,
                'userID' => 321321321,
                'inviterID' => 0,
                'vipLevel' => 'VIP-2',
                'mktMakerLevel' => '0',
                'affiliateID' => 0,
                'rsaPublicKey' => '',
                'isMaster' => true,
                'parentUid' => '0',
                'kycLevel' => 'LEVEL_DEFAULT',
                'kycRegion' => '',
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
            'Content-Length' => '772',
            'Connection' => 'keep-alive',
            'Date' => 'Wed, 12 Feb 2025 19:14:12 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1739387652864',
            'Ret_code' => '0',
            'Traceid' => '5b81f14e94e0df5a24d5bd2e35620533',
            'Timenow' => '1739387652889',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 f73b010838a44ddb3d7ec843a071c1ce.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'OMXDLjbLQq2Jk8-NlQWGQvtPYh-2_IjzV1TQA3hfxVhIFEmRyIm1NA==',
        ];
    }
}
