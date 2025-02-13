<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\GetSubAccountAllApiKeys;

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
                'result' => [
                    0 => [
                        'id' => '1876487',
                        'ips' => [
                            0 => '111.111.111.111',
                        ],
                        'apiKey' => 'dsadas',
                        'note' => 'foo',
                        'status' => 1,
                        'expiredAt' => '1970-01-01T00:00:00Z',
                        'createdAt' => '2024-08-27T18:27:06Z',
                        'type' => 1,
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
                                1 => 'SubMemberTransferList',
                            ],
                            'Options' => [
                                0 => 'OptionsTrade',
                            ],
                            'Derivatives' => [
                                0 => 'DerivativesTrade',
                            ],
                            'CopyTrading' => [
                                0 => 'CopyTrading',
                            ],
                            'BlockTrade' => [],
                            'Exchange' => [
                                0 => 'ExchangeHistory',
                            ],
                            'NFT' => [],
                            'Affiliate' => [],
                            'Earn' => [],
                        ],
                        'secret' => '******',
                        'readOnly' => false,
                        'deadlineDay' => -2,
                        'flag' => 'hmac',
                    ],
                ],
                'nextPageCursor' => '',
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
            'Content-Length' => '706',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 14:22:07 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '10',
            'X-Bapi-Limit-Status' => '9',
            'X-Bapi-Limit-Reset-Timestamp' => '1739456527387',
            'Ret_code' => '0',
            'Traceid' => '2a5a9645ceb4da1e310ab95d1d547236',
            'Timenow' => '1739456527392',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 3ba93a6ef49a771baec432f3334c38ca.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GIG51-P4',
            'X-Amz-Cf-Id' => '_vMnHb6P7_zxz6ktjfxyKS81ony-ZkxbJI7IgDNCMxwB4yYw9Pf-8g==',
        ];
    }
}
