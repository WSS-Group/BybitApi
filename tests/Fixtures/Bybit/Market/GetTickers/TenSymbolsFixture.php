<?php

namespace BybitApi\Tests\Fixtures\Bybit\Market\GetTickers;

use BybitApi\Tests\Fixtures\Fixture;

class TenSymbolsFixture extends Fixture
{
    public function body(): array|string|int
    {
        $current = now();

        return [
            'retCode' => 0,
            'retMsg' => 'OK',
            'result' => [
                'category' => 'inverse',
                'list' => $this->symbols(),
            ],
            'retExtInfo' => [],
            'time' => $current->getTimestampMs(),
        ];
    }

    protected function symbols(): array
    {
        $symbolNames = [
            'ADAUSD', 'BTCUSD', 'BTCUSDH25', 'BTCUSDM25', 'LTCUSD', 'MANAUSD', 'ETHUSD', 'EOSUSD', 'DOTUSD', 'XRPUSD',
        ];
        $symbols = [];
        foreach ($symbolNames as $name) {
            $symbols[] = [
                'symbol' => $name,
                'lastPrice' => '0.4185',
                'indexPrice' => '0.4367',
                'markPrice' => '0.4226',
                'prevPrice24h' => '0.4720',
                'price24hPcnt' => '-0.113347',
                'highPrice24h' => '0.5285',
                'lowPrice24h' => '0.3800',
                'prevPrice1h' => '0.4110',
                'openInterest' => '5829173',
                'openInterestValue' => '13793594.42',
                'turnover24h' => '139183915.7395',
                'volume24h' => '61020175.0000',
                'fundingRate' => '-0.0075',
                'nextFundingTime' => '1738022400000',
                'predictedDeliveryPrice' => '',
                'basisRate' => '',
                'deliveryFeeRate' => '',
                'deliveryTime' => '0',
                'ask1Size' => '1778',
                'bid1Price' => '0.4180',
                'ask1Price' => '0.4185',
                'bid1Size' => '168',
                'basis' => '',
                'preOpenPrice' => '',
                'preQty' => '',
                'curPreListingPhase' => '',
            ];
        }

        return $symbols;
    }

    public function status(): int
    {
        return 200;
    }

    public function headers(): array
    {
        return [
            'Content-Type' => 'application/json; charset=utf-8',
            'Content-Length' => '8090',
            'Connection' => 'keep-alive',
            'Date' => 'Mon, 27 Jan 2025 19:35:06 GMT',
            'x-cld-src' => 'Loc-A',
            'Ret_code' => '0',
            'Traceid' => '2d3a594dc119199c670c23b53af6cfc0',
            'Timenow' => '1738006506091',
            'Server' => 'Openresty',
            'X-Cache' => 'Miss from cloudfront',
            'Via' => '1.1 9e31700f985ceee1721a2621b21c803a.cloudfront.net (CloudFront)',
            'X-Amz-Cf-Pop' => 'GRU1-C1',
            'X-Amz-Cf-Id' => 'rOY4JCIEA98uH_8EgPzVq11yTyp4Mdtw52i5dmA1wOd4q6b-zlmdOQ==',
        ];
    }
}
