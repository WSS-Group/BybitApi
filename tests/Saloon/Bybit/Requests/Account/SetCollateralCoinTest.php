<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetCollateralCoin;
use BybitApi\Tests\Fixtures\Bybit\Account\SetCollateralCoin\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can set a collateral coin', function () {
    MockClient::global([
        SetCollateralCoin::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->setCollateralCoin('BTC', true);

    expect($result)
        ->toBeTrue();
});
