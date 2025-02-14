<?php

use BybitApi\DTOs\Account\CoinGreek;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetCoinGreeks;
use BybitApi\Tests\Fixtures\Bybit\Account\GetCoinGreeks\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get coins greeks', function () {
    MockClient::global([
        GetCoinGreeks::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getCoinGreeks();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\CoinGreek $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(CoinGreek::class)
                ->and($value->baseCoin)
                ->toBeString()
                ->and($value->totalDelta)
                ->toBeFloat()
                ->and($value->totalGamma)
                ->toBeFloat()
                ->and($value->totalVega)
                ->toBeFloat()
                ->and($value->totalTheta)
                ->toBeFloat();
        });
});
