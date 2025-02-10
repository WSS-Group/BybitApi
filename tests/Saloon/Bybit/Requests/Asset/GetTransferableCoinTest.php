<?php

use BybitApi\Enums\AccountType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetTransferableCoin;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetTransferableCoin\OkFixture;
use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;

it('return a list of transferable coins', function () {
    MockClient::global([
        GetTransferableCoin::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getTransferableCoin(AccountType::FUND, AccountType::UNIFIED);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(188)
        ->each
        ->toBeString();
});
