<?php

use BybitApi\DTOs\User\ChangedApiKey;
use BybitApi\DTOs\User\Permissions;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\CreateSubUIDApiKey;
use BybitApi\Tests\Fixtures\Bybit\User\CreateSubUIDApiKey\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can create an account', function () {
    MockClient::global([
        CreateSubUIDApiKey::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->createSubUidApiKey(
        321321,
        false,
        new \BybitApi\Http\Integrations\Bybit\Entities\Users\Permissions,
        'foo'
    );

    expect($result)
        ->toBeInstanceOf(ChangedApiKey::class)
        ->and($result->id)
        ->toBeString()
        ->and($result->note)
        ->toBeString()
        ->and($result->apiKey)
        ->toBeString()
        ->and($result->readOnly)
        ->toBeBool()
        ->and($result->secret)
        ->toBeString()
        ->and($result->permissions)
        ->toBeInstanceOf(Permissions::class);
});
