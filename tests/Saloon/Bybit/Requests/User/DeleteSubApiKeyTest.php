<?php

use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\DeleteSubAPIKey;
use BybitApi\Tests\Fixtures\Bybit\User\DeleteSubApiKey\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can delete an apikey from sub account', function () {
    MockClient::global([
        DeleteSubAPIKey::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->deleteSubApiKey('dsadadsa');

    expect($result)
        ->toBeTrue();
});
