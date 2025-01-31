<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetIndexPriceKline;

use BybitApi\Tests\Fixtures\Fixture;
use Saloon\Http\PendingRequest;

class TwentyMinuteCandlesFixture extends Fixture
{
    public function body(PendingRequest $pendingRequest): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'symbol' => 'BTCUSDT',
                'category' => '',
                'list' => $this->candles(),
            ],
            'retExtInfo' => [],
            'time' => $current->getTimestampMs(),
        ];
    }

    protected function candles(): array
    {
        $candles = [];

        $startPrice = fake()->randomFloat(2, 20_000, 100_000);

        $firstTs = now()->startOfMinute();
        foreach (range(0, 19) as $index) {
            $variation1 = fake()->randomFloat(4, 0.98, 1.02);
            $variation2 = fake()->randomFloat(4, 1, max($variation1, 1.02));
            $variation3 = fake()->randomFloat(4, min($variation1, 0.98), 1);
            $closePrice = $startPrice * $variation1;
            $candles[$index] = [
                0 => $firstTs->getTimestampMs(),
                1 => $startPrice,
                2 => $startPrice * $variation2,
                3 => $startPrice * $variation3,
                4 => $closePrice,
            ];
            $startPrice = $closePrice;
            $firstTs = $firstTs->subMinute();
        }

        return $candles;
    }

    public function status(PendingRequest $pendingRequest): int
    {
        return 200;
    }

    public function headers(PendingRequest $pendingRequest): array
    {
        return [
            'Content-Type' => 'application/json',
            'Content-Length' => '1684',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 27 Jan 2025 18:08:02 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '01cc371f77726ae06b62251b92af71eb',
            'Timenow' => '1738001282568',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 257bf616e82b7bdb9c0b2562445411f0.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU3-C2',
            'X-Amz-Cf-Id' => 'gxo443lMk1IG_kqXoZA5_yWFX-JHa77EQ64188a7xCA-NcoQERB4eA==',
        ];
    }
}
