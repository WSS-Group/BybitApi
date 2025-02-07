<?php

use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetWithdrawableAmount;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetWithdrawableAmount\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return amount available for withdraw', function () {
    MockClient::global([
        GetWithdrawableAmount::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getWithdrawableAmount('BTC');

    expect($result)
        ->toBeInstanceOf(WithdrawableAmount::class)
        ->and($result->withdrawableAmount)
        ->toBeInstanceOf(WithdrawableAmount\AccountTypes::class)
        ->and($result->withdrawableAmount->FUND)
        ->toBeInstanceOf(WithdrawableAmount\Account::class)
        ->and($result->withdrawableAmount->SPOT)
        ->toBeInstanceOf(WithdrawableAmount\Account::class)
        ->and($result->withdrawableAmount->SPOT->withdrawableAmount)
        ->toBeFloat();

});
