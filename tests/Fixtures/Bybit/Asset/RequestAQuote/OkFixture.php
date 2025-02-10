<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\RequestAQuote;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'ok',
            'result' => [
                'quoteTxId' => '101021184489633660900188160',
                'exchangeRate' => '87535.473390000000000000',
                'fromCoin' => 'BTC',
                'fromCoinType' => 'crypto',
                'toCoin' => 'USDT',
                'toCoinType' => 'crypto',
                'fromAmount' => '0.01',
                'toAmount' => '875.354733900000000000',
                'expiredTime' => '1739214576751',
                'requestId' => '',
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
            'Content-Length' => '339',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 19:09:21 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739214561709',
            'Ret_code' => '0',
            'Traceid' => '5c3045e75ab0deb147703301a2fea89f',
            'Timenow' => '1739214561772',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 4e32b9cbc484dba9437d8220b2515796.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'GGopwDNynHJWuK41URgFfWIJOnarl5whlO1W3_3yvtxu7gWrCk_VoA==',
        ];
    }
}
