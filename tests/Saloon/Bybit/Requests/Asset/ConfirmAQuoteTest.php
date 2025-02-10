<?php

use BybitApi\DTOs\Asset\Convert;
use BybitApi\Enums\ExchangeStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\ConfirmAQuote;
use BybitApi\Tests\Fixtures\Bybit\Asset\ConfirmAQuote\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can confirm a quote for convert a coin', function () {
    MockClient::global([
        ConfirmAQuote::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->confirmAQuote('foo_bar');

    expect($result)
        ->toBeInstanceOf(Convert::class)
        ->and($result->quoteTxId)
        ->toBeString()
        ->toEqual('foo_bar')
        ->and($result->exchangeStatus)
        ->toBeInstanceOf(ExchangeStatus::class);
});
