<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Account;

it('check if all not implemented tests throw exception', function () {
    $account = Account::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Account::";

    expect(fn () => $account->getBorrowHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getBorrowHistory'.")
        ->and(fn () => $account->repayLiability())
        ->toThrow(NotImplementedYetException::class, "{$commonError}repayLiability'.")
        ->and(fn () => $account->setCollateralCoin())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setCollateralCoin'.")
        ->and(fn () => $account->batchSetCollateralCoin())
        ->toThrow(NotImplementedYetException::class, "{$commonError}batchSetCollateralCoin'.")
        ->and(fn () => $account->getCoinGreeks())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getCoinGreeks'.")
        ->and(fn () => $account->getDcpInfo())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getDcpInfo'.")
        ->and(fn () => $account->getUtaTransactionLog())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getUtaTransactionLog'.")
        ->and(fn () => $account->getClassicTransactionLog())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getClassicTransactionLog'.")
        ->and(fn () => $account->getSmpGroupId())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getSmpGroupId'.")
        ->and(fn () => $account->setMarginMode())
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
