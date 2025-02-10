<?php

use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Entities\Assets\Beneficiary;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\Withdraw;
use BybitApi\Tests\Fixtures\Bybit\Asset\Withdraw\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can create an internal withdraw', function () {
    MockClient::global([
        Withdraw::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->withdraw(
        'BTC',
        '32132131',
        0.5,
        now(),
        forceChain: 2
    );

    expect($result)
        ->toBeString();

});

it('can create a withdraw with beneficiary', function () {
    MockClient::global([
        Withdraw::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->withdraw(
        'BTC',
        '32132131',
        0.5,
        now(),
        forceChain: 2,
        beneficiary: new Beneficiary('foo_bar')
    );

    expect($result)
        ->toBeString();

});
