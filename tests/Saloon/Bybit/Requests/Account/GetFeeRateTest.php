<?php

use BybitApi\DTOs\Account\FeeRate;
use BybitApi\Enums\Category;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetFeeRate;
use BybitApi\Tests\Fixtures\Bybit\Account\GetFeeRate\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get fee rate for a category', function () {
    MockClient::global([
        GetFeeRate::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getFeeRate(Category::LINEAR);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(10)
        ->each(function (Expectation $e) {
            /** @var FeeRate $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(FeeRate::class)
                ->and($value->symbol)
                ->toBeString()
                ->and($value->takerFeeRate)
                ->toBeFloat()
                ->and($value->makerFeeRate)
                ->toBeFloat();
        });
});
