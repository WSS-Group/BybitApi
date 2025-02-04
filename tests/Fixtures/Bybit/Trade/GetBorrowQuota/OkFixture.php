<?php

namespace BybitApi\Tests\Fixtures\Bybit\Trade\GetBorrowQuota;

use BybitApi\DTOs\Trade\CanceledOrder;
use BybitApi\Tests\Fixtures\Fixture;
use Illuminate\Support\Collection;
use Saloon\Http\PendingRequest;

class OkFixture extends Fixture
{

    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        /** @var \BybitApi\Http\Integrations\Bybit\Requests\Trade\GetBorrowQuota $request */
        $request = $pendingRequest->getRequest();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                "symbol" => $request->symbol,
                "maxTradeQty" => "0.7768",
                "side" => $request->side->value,
                "spotMaxTradeAmount" => "9501.32150381",
                "maxTradeAmount" => "76387.09907647",
                "borrowCoin" => "USDT",
                "spotMaxTradeQty" => "0.0966",
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
            "Content-Type" => "application/json; charset=utf-8",
            "Content-Length" => "248",
            "Connection" => "keep-alive",
            "Date" => "Tue, 04 Feb 2025 15:34:35 GMT",
            "x-cld-src" => "Loc-A",
            "X-Bapi-Limit" => "50",
            "X-Bapi-Limit-Status" => "49",
            "X-Bapi-Limit-Reset-Timestamp" => "1738683275558",
            "Ret_code" => "0",
            "Traceid" => "66efdfe53c760ea04ddb59f7b9a82f0b",
            "Timenow" => "1738683275561",
            "Server" => "Openresty",
            "X-Cache" => "Miss from cloudfront",
            "Via" => "1.1 84a38ce63246feb53b77e79bbed12696.cloudfront.net (CloudFront)",
            "X-Amz-Cf-Pop" => "GRU3-C2",
            "X-Amz-Cf-Id" => "aUOaQuNG3ifNnLuNIsdb3pSbDusuctF2x5jwryqSIzI9cHah62vS2g==",
        ];
    }
}
