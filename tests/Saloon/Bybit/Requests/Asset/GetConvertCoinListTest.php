<?php

use BybitApi\DTOs\Asset\ConvertCoin;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetConvertCoinList;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetConvertCoinList\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a list of convert coins', function () {
    MockClient::global([
        GetConvertCoinList::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getConvertCoinList(ConvertAccountType::FUNDING);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Asset\ConvertCoin $coin */
            $coin = $e->value;
            $e->toBeInstanceOf(ConvertCoin::class)
                ->and($coin->coin)
                ->toBeString()
                ->and($coin->fullName)
                ->toBeString()
                ->and($coin->icon)
                ->toBeString()
                ->and($coin->iconNight)
                ->toBeString()
                ->and($coin->accuracyLength)
                ->toBeInt()
                ->and($coin->coinType)
                ->toBeInstanceOf(CoinType::class)
                ->and($coin->balance)
                ->toBeNull()
                ->and($coin->uBalance)
                ->toBeNull()
                ->and($coin->singleFromMinLimit)
                ->toBeFloat()
                ->and($coin->singleToMaxLimit)
                ->toBeFloat();
        });
});
