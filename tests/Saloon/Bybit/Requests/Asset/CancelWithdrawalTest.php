<?php

use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CancelWithdrawal;
use BybitApi\Tests\Fixtures\Bybit\Asset\CancelWithdrawal\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can cancel a withdraw', function () {
    MockClient::global([
        CancelWithdrawal::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->cancelWithdrawal(21321);

    expect($result)
        ->toBeTrue();

});
