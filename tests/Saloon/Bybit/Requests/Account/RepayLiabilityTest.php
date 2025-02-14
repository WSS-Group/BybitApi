<?php

use BybitApi\DTOs\Account\Repayment;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\RepayLiability;
use BybitApi\Tests\Fixtures\Bybit\Account\RepayLiability\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can repay', function () {
    MockClient::global([
        RepayLiability::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->repayLiability('BTC');

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\Repayment $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(Repayment::class)
                ->and($value->coin)
                ->toBeString()
                ->and($value->repaymentQty)
                ->toBeFloat();
        });
});
