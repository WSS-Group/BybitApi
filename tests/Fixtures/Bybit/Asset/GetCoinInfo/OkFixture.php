<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetCoinInfo;

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
                'rows' => [
                    0 => [
                        'name' => 'AAVE',
                        'coin' => 'AAVE',
                        'remainAmount' => '0',
                        'chains' => [
                            0 => [
                                'chainType' => 'Ethereum',
                                'confirmation' => '12',
                                'withdrawFee' => '0',
                                'depositMin' => '0',
                                'withdrawMin' => '0',
                                'chain' => 'ETH',
                                'chainDeposit' => '0',
                                'chainWithdraw' => '1',
                                'minAccuracy' => '8',
                                'withdrawPercentageFee' => '0',
                                'contractAddress' => '0xd989df310cf6b0238dd4a993bfb29c40410f294f',
                            ],
                        ],
                    ],
                    1 => [
                        'name' => 'ACH',
                        'coin' => 'ACH',
                        'remainAmount' => '0',
                        'chains' => [
                            0 => [
                                'chainType' => 'Ethereum',
                                'confirmation' => '12',
                                'withdrawFee' => '',
                                'depositMin' => '0',
                                'withdrawMin' => '',
                                'chain' => 'ETH',
                                'chainDeposit' => '0',
                                'chainWithdraw' => '0',
                                'minAccuracy' => '8',
                                'withdrawPercentageFee' => '',
                                'contractAddress' => '',
                            ],
                        ],
                    ],
                    2 => [
                        'name' => 'ADA',
                        'coin' => 'ADA',
                        'remainAmount' => '10000000',
                        'chains' => [
                            0 => [
                                'chainType' => 'ADA',
                                'confirmation' => '15',
                                'withdrawFee' => '2',
                                'depositMin' => '0',
                                'withdrawMin' => '1',
                                'chain' => 'ADA',
                                'chainDeposit' => '1',
                                'chainWithdraw' => '1',
                                'minAccuracy' => '6',
                                'withdrawPercentageFee' => '0',
                                'contractAddress' => '',
                            ],
                        ],
                    ],
                    3 => [
                        'name' => 'AGIX',
                        'coin' => 'AGIX',
                        'remainAmount' => '10000000',
                        'chains' => [
                            0 => [
                                'chainType' => 'ETH',
                                'confirmation' => '6',
                                'withdrawFee' => '0.1',
                                'depositMin' => '0',
                                'withdrawMin' => '10000000',
                                'chain' => 'ETH',
                                'chainDeposit' => '0',
                                'chainWithdraw' => '0',
                                'minAccuracy' => '8',
                                'withdrawPercentageFee' => '0',
                                'contractAddress' => '0x4691937a7508860f876c9c0a2a617e7d9e945d4b',
                            ],
                        ],
                    ],
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
            'Content-Length' => '34433',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 18:49:48 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1738954188527',
            'Ret_code' => '0',
            'Traceid' => '784e907c20393fe26c8c6d695b2f9115',
            'Timenow' => '1738954188567',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 47c1359807d43ce291253d0840c23364.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'xK9ZZ0F6VAlUYhsJQPrLUMf6nDfnL5kv0vabM4pALUhack4vhLHbNw==',
        ];
    }
}
