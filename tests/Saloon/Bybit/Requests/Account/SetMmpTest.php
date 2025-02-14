<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\SetMmp;
use BybitApi\Tests\Fixtures\Bybit\Account\SetMmp\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can set mmp', function () {
    MockClient::global([
        SetMmp::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->setMmp('ETH', 5000, 100000, 50, 20);

    expect($result)
        ->toBeBool();
});
