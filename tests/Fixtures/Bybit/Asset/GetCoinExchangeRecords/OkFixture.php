<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\GetCoinExchangeRecords;

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
                'orderBody' => [
                    0 => [
                        'fromCoin' => 'BTC',
                        'fromAmount' => '0.100000000000000000',
                        'toCoin' => 'ETH',
                        'toAmount' => '1.385866230000000000',
                        'exchangeRate' => '13.858662380000000000',
                        'createdTime' => '1738897200',
                        'exchangeTxId' => '145102533285208544812654440448',
                    ],
                ],
                'nextPageCursor' => '173341:1672197760',
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
            'Content-Length' => '108',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 07 Feb 2025 19:35:57 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '194679886a0d26187fb2870b52836c68',
            'Timenow' => '1738956957933',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 4b0e0d109fbe174b2ad1b00f1e25c2fa.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'N4ajIJ0OGRFEzryjx9YrwyDVLwwar3Io3BWK6izglQ6ib88gA6ij_w==',
        ];
    }
}
