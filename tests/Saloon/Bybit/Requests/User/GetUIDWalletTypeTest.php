<?php

use BybitApi\DTOs\User\WalletType;
use BybitApi\Enums\AccountType;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetUIDWalletType;
use BybitApi\Tests\Fixtures\Bybit\User\GetUIDWalletType\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can return list of sub uid', function () {
    MockClient::global([
        GetUIDWalletType::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->getUIDWalletType();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            expect($e->value)
                ->toBeInstanceOf(WalletType::class)
                ->and($e->value->accountType)
                ->toBeArray()
                ->each
                ->toBeInstanceOf(AccountType::class);
        });
});
