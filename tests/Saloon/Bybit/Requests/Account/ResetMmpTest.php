<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\ResetMmp;
use BybitApi\Tests\Fixtures\Bybit\Account\ResetMmp\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can set mmp', function () {
    MockClient::global([
        ResetMmp::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->resetMmp('ETH');

    expect($result)
        ->toBeBool();
});
