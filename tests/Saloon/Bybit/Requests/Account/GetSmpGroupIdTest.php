<?php

use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetSmpGroupId;
use BybitApi\Tests\Fixtures\Bybit\Account\GetSmpGroupId\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get smp group', function () {
    MockClient::global([
        GetSmpGroupId::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getSmpGroupId();

    expect($result)
        ->toBeInt();
});
