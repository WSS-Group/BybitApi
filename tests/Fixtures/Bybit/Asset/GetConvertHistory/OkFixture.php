<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertHistory;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertStatus $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'ok',
            'result' => [
                'list' => [
                    0 => [
                        'accountType' => 'eb_convert_funding',
                        'exchangeTxId' => '1010010374489637617096847360',
                        'userId' => '100398343',
                        'fromCoin' => 'USDT',
                        'fromCoinType' => 'crypto',
                        'fromAmount' => '100',
                        'toCoin' => 'BTC',
                        'toCoinType' => 'crypto',
                        'toAmount' => '0.00100099356',
                        'exchangeStatus' => 'success',
                        'extInfo' => [
                            'paramType' => 'foo',
                            'paramValue' => 'bar',
                        ],
                        'convertRate' => '0.0000100099356',
                        'createdAt' => '1739215505442',
                    ],
                    1 => [
                        'accountType' => 'eb_convert_funding',
                        'exchangeTxId' => '10102193168489637370786385920',
                        'userId' => '100398343',
                        'fromCoin' => 'USDT',
                        'fromCoinType' => 'crypto',
                        'fromAmount' => '100',
                        'toCoin' => 'BTC',
                        'toCoinType' => 'crypto',
                        'toAmount' => '0.001001073038',
                        'exchangeStatus' => 'success',
                        'extInfo' => [
                            'paramType' => 'foo',
                            'paramValue' => 'bar',
                        ],
                        'convertRate' => '0.00001001073038',
                        'createdAt' => '1739215446724',
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
            'Content-Length' => '745',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 19:52:31 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '4c9123dd8f0705544858e5e53614572e',
            'Timenow' => '1739217151319',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'LpGbL-BKqW121nM3jqKf8k341vXf34m14GauwwRrn0eAsMZiqxbqcA==',
        ];
    }
}
