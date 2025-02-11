<?php

use BybitApi\DTOs\User\UID;
use BybitApi\Enums\MemberType;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\CreateSubUID;
use BybitApi\Tests\Fixtures\Bybit\User\CreateSubUID\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can create an account', function () {
    MockClient::global([
        CreateSubUID::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->createSubUID('foo12', MemberType::NORMAL);

    expect($result)
        ->toBeInstanceOf(UID::class);
});
