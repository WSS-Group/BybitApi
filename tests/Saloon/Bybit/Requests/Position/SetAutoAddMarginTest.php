<?php

use BybitApi\Enums\Category;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetAutoAddMargin;
use BybitApi\Tests\Fixtures\Bybit\Position\SetAutoAddMargin\NotModifiedFixture;
use BybitApi\Tests\Fixtures\Bybit\Position\SetAutoAddMargin\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true auto margin modified', function () {
    MockClient::global([
        SetAutoAddMargin::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setAutoAddMargin(Category::LINEAR, 'BTCUSDT', true);

    expect($result)
        ->toBeTrue();
});

it('return true when it already is the wanted mode', function () {
    MockClient::global([
        SetAutoAddMargin::class => NotModifiedFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->setAutoAddMargin(Category::LINEAR, 'BTCUSDT', true);

    expect($result)
        ->toBeTrue();
});
