<?php

use BybitApi\DTOs\Asset\ConvertExtInfo;
use BybitApi\DTOs\Asset\ConvertStatus;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Enums\ExchangeStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertHistory;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertHistory\OkFixture;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get a history of conversions', function () {
    MockClient::global([
        GetConvertHistory::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getConvertHistory();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->each(function (Expectation $e) {
            /** @var ConvertStatus $status */
            $status = $e->value;
            expect($status)
                ->toBeInstanceOf(ConvertStatus::class)
                ->and($status->accountType)
                ->toBeInstanceOf(ConvertAccountType::class)
                ->and($status->exchangeTxId)
                ->toBeString()
                ->and($status->userId)
                ->toBeString()
                ->and($status->fromCoin)
                ->toBeString()
                ->and($status->fromCoinType)
                ->toBeInstanceOf(CoinType::class)
                ->and($status->toCoin)
                ->toBeString()
                ->and($status->toCoinType)
                ->toBeInstanceOf(CoinType::class)
                ->and($status->fromAmount)
                ->toBeFloat()
                ->and($status->toAmount)
                ->toBeFloat()
                ->and($status->exchangeStatus)
                ->toBeInstanceOf(ExchangeStatus::class)
                ->and($status->extInfo)
                ->toBeInstanceOf(ConvertExtInfo::class)
                ->and($status->extInfo->paramType)
                ->toBeString()
                ->toEqual('foo')
                ->and($status->extInfo->paramValue)
                ->toBeString()
                ->toEqual('bar')
                ->and($status->convertRate)
                ->toBeFloat()
                ->and($status->createdAt)
                ->toBeInstanceOf(Carbon::class);
        });
});
