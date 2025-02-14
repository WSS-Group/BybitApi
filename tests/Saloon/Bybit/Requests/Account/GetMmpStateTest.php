<?php

use BybitApi\DTOs\Account\MmpState;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetMmpState;
use BybitApi\Tests\Fixtures\Bybit\Account\GetMmpState\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can set mmp', function () {
    MockClient::global([
        GetMmpState::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getMmpState('ETH');

    expect($result)
        ->toBeCollection()
        ->toHaveCount(1)
        ->each(function (Expectation $expectation) {
            /** @var \BybitApi\DTOs\Account\MmpState $value */
            $value = $expectation->value;
            expect($value)
                ->toBeInstanceOf(MmpState::class)
                ->and($value->baseCoin)
                ->toBeString()
                ->and($value->mmpEnabled)
                ->toBeBool()
                ->and($value->window)
                ->toBeInt()
                ->and($value->frozenPeriod)
                ->toBeInt()
                ->and($value->qtyLimit)
                ->toBeFloat()
                ->and($value->deltaLimit)
                ->toBeFloat()
                ->and($value->mmpFrozenUntil)
                ->toBeInstanceOf(Carbon::class);
        });
});
