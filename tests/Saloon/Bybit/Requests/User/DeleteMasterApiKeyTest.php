<?php

use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\DeleteMasterAPIKey;
use BybitApi\Tests\Fixtures\Bybit\User\DeleteMasterApiKey\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can delete an apikey from sub account', function () {
    MockClient::global([
        DeleteMasterAPIKey::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->deleteMasterApiKey();

    expect($result)
        ->toBeTrue();
});
