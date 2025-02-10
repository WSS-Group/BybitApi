<?php

namespace BybitApi\Tests\Fixtures\Bybit\Asset\ConfirmAQuote;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();
        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Asset\ConfirmAQuote $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'ok',
            'result' => [
                'exchangeStatus' => 'processing',
                'quoteTxId' => $request->quoteTxId,
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
            'Content-Length' => '148',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 10 Feb 2025 19:25:05 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '5',
            'X-Bapi-Limit-Status' => '4',
            'X-Bapi-Limit-Reset-Timestamp' => '1739215505416',
            'Ret_code' => '0',
            'Traceid' => '5750f279f0e7722638a7645a259a24df',
            'Timenow' => '1739215505894',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 2e5f15b69d5f9af75749c48642a17b50.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'qyMQJTFazUZXcK0MHlghLq8C6Angqt2yz2zHPlpW1euFlekPDiOh9g==',
        ];
    }
}
