<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetTransferableAmount;
use BybitApi\Tests\Fixtures\Bybit\Account\GetTransferableAmount\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get transferable amount', function () {
    MockClient::global([
        GetTransferableAmount::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getTransferableAmount('BTC');

    expect($result)
        ->toBeFloat();
});
