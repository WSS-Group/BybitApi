<?php

namespace BybitApi\Tests\Fixtures\Bybit\User\ModifySubApiKey;

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
                'id' => '1876487',
                'note' => 'allga_trap_local',
                'apiKey' => 'tfVf4m0wFlLSwKuUJC',
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
            'Content-Length' => '471',
            'Connection' => 'keep-alive',
            'Date' => 'Thu, 13 Feb 2025 17:52:04 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739469124371',
            'Ret_code' => '0',
            'Traceid' => '23535cbe6812d4fe1629cd4a79e04c3c',
            'Timenow' => '1739469124499',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2268373f32ed46c458ef5057fc6f60f8.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'o1LAg2QpvfEfCc1xV007dpEhDrroYB2jOJe4MqUM0VrOCMI_RuH9_Q==',
        ];
    }
}
