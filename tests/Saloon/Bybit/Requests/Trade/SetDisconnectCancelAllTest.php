<?php

use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\SetDisconnectCancelAll;
use BybitApi\Tests\Fixtures\Bybit\Trade\SetDisconnectCancelAll\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can set a value', function () {
    MockClient::global([
        SetDisconnectCancelAll::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->setDisconnectCancelAll(10);
    expect($result)
        ->toBeTrue();
});
