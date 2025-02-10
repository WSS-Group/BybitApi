<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertStatus;

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
                'result' => [
                    'accountType' => $request->accountType->value,
                    'exchangeTxId' => $request->quoteTxId,
                    'userId' => '100398343',
                    'fromCoin' => 'USDT',
                    'fromCoinType' => 'crypto',
                    'fromAmount' => '100',
                    'toCoin' => 'BTC',
                    'toCoinType' => 'crypto',
                    'toAmount' => '0.00100099356',
                    'exchangeStatus' => 'success',
                    'extInfo' => [],
                    'convertRate' => '0.0000100099356',
                    'createdAt' => '1739215505442',
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
            'Content-Length' => '413',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 19:36:30 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '0c31b252373e67f6741849cbdf97ae51',
            'Timenow' => '1739216190768',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 257bf616e82b7bdb9c0b2562445411f0.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => '-sTPPwC7Vpx2uJpITTg9VU7I4NIBX59gb0nAnjiQx7pxW4JZCf4suA==',
        ];
    }
}
