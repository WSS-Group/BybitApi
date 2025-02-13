<?php

use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\DeleteSubUID;
use BybitApi\Tests\Fixtures\Bybit\User\DeleteSubUID\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can delete an account', function () {
    MockClient::global([
        DeleteSubUID::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->deleteSubUid(121);

    expect($result)
        ->toBeTrue();
});
