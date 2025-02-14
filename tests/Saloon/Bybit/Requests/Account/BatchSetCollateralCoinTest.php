<?php

use BybitApi\DTOs\Account\ChangedCollateral;
use BybitApi\Enums\CollateralSwitch;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Entities\Account\CollateralCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Account\BatchSetCollateralCoin;
use BybitApi\Tests\Fixtures\Bybit\Account\BatchSetCollateralCoin\OkFixture;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can set a collateral coin for a batch', function () {
    MockClient::global([
        BatchSetCollateralCoin::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->batchSetCollateralCoin(
        new CollateralCoin('BTC', CollateralSwitch::ON),
        new CollateralCoin('ETH', CollateralSwitch::ON),
    );

    expect($result)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\ChangedCollateral $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(ChangedCollateral::class)
                ->and($value->coin)
                ->toBeString()
                ->and($value->collateralSwitch)
                ->toBeInstanceOf(CollateralSwitch::class);
        });
});
