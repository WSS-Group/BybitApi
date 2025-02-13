<?php

use BybitApi\DTOs\User\ChangedApiKey;
use BybitApi\DTOs\User\Permissions;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\ModifyMasterApiKey;
use BybitApi\Tests\Fixtures\Bybit\User\ModifyMasterApiKey\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can modify api from master account', function () {
    MockClient::global([
        ModifyMasterApiKey::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->modifyMasterApiKey(
        ips: ['*'],
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
        ->toBeNull()
        ->and($result->permissions)
        ->toBeInstanceOf(Permissions::class);
});
