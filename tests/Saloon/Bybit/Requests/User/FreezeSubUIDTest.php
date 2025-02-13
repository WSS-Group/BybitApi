<?php

use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\FreezeSubUID;
use BybitApi\Tests\Fixtures\Bybit\User\FreezeSubUID\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can freeze an account', function () {
    MockClient::global([
        FreezeSubUID::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->freezeSubUid('231231', true);

    expect($result)
        ->toBeTrue();
});
