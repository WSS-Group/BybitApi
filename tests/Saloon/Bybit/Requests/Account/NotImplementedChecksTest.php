<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Account;

it('check if all not implemented tests throw exception', function () {
    $account = Account::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Account::";

    expect(fn () => $account->setMarginMode())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setMarginMode'.")
        ->and(fn () => $account->setSpotHedging())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setSpotHedging'.")
        ->and(fn () => $account->setMmp())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setMmp'.")
        ->and(fn () => $account->resetMmp())
        ->toThrow(NotImplementedYetException::class, "{$commonError}resetMmp'.")
        ->and(fn () => $account->getMmpState())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getMmpState'.");
});
