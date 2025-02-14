<?php

namespace BybitApi\Tests\Fixtures\Bybit\Account\GetUtaTransactionLog;

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
                'nextPageCursor' => '1739197117347%3A740369%2C1739197117347%3A740369',
                'list' => [
                    0 => [
                        'symbol' => '',
                        'side' => 'None',
                        'funding' => '0',
                        'orderLinkId' => '',
                        'orderId' => '',
                        'fee' => '0',
                        'change' => '0.5',
                        'cashFlow' => '0.5',
                        'transactionTime' => '1739197117347',
                        'type' => 'TRANSFER_IN',
                        'feeRate' => '0',
                        'bonusChange' => '0',
                        'size' => '0',
                        'qty' => '0',
                        'cashBalance' => '0.51474281',
                        'currency' => 'BTC',
                        'id' => '104328343-100398431-7f7a498e-c12c-440c-b9b8-c8da094d0f1a',
                        'category' => '',
                        'tradePrice' => '0',
                        'tradeId' => '',
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
            'Content-Length' => '525',
            'Connection' => 'keep-alive',
            'Date' => 'Fri, 14 Feb 2025 17:05:43 GMT',
            'x-cld-src' => 'Loc-A',
            'X-Bapi-Limit' => '50',
            'X-Bapi-Limit-Status' => '49',
            'X-Bapi-Limit-Reset-Timestamp' => '1739552743365',
            'Ret_code' => '0',
            'Traceid' => '09bb49d90492f399199e09ebec442c1a',
            'Timenow' => '1739552743372',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 a13739d34a59cbb00bd3fbf3a185a584.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'G5XvcrIFcmtC8RfBeDewuGTf8tVdDokPjiK-kVL3kV30me-j--TqJg==',
        ];
    }
}
