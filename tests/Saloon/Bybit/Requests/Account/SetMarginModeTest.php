<?php

use BybitApi\DTOs\Account\MarginModeReason;
use BybitApi\Enums\MarginMode;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetMarginMode;
use BybitApi\Tests\Fixtures\Bybit\Account\SetMarginMode\FailFixture;
use BybitApi\Tests\Fixtures\Bybit\Account\SetMarginMode\OkFixture;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can set a collateral coin', function () {
    MockClient::global([
        SetMarginMode::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->setMarginMode(MarginMode::REGULAR_MARGIN);

    expect($result)
        ->toBeCollection()
        ->toHaveCount(0);
});

it('can\'t set a collateral coin', function () {
    MockClient::global([
        SetMarginMode::class => FailFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->setMarginMode(MarginMode::REGULAR_MARGIN);

    expect($result)
        ->toBeCollection()
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\MarginModeReason $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(MarginModeReason::class)
                ->and($value->reasonCode)
                ->toBeInt()
                ->and($value->reasonMsg)
                ->toBeString();
        });
});
