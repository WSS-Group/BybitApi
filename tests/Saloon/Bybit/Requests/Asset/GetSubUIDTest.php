<?php

use BybitApi\DTOs\Asset\SubUID;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetSubUID;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetSubUID\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return a list of coins', function () {
    MockClient::global([
        GetSubUID::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getSubUID();

    expect($result)
        ->toBeInstanceOf(SubUID::class)
        ->and($result->subMemberIds)
        ->toBeArray()
        ->toHaveCount(3)
        ->each
        ->toBeString()
        ->and($result->transferableSubMemberIds)
        ->toBeArray()
        ->toHaveCount(3)
        ->each
        ->toBeString();
});
