<?php

use BybitApi\DTOs\Account\Balance;
use BybitApi\Enums\AccountType;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetWalletBalance;
use BybitApi\Tests\Fixtures\Bybit\Account\GetWalletBalance\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get fee rate for a category', function () {
    MockClient::global([
        GetWalletBalance::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getWalletBalance(AccountType::FUND);

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\Balance $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(Balance::class)
                ->and($value->accountType)
                ->toBeInstanceOf(AccountType::class)
                ->and($value->accountLTV)
                ->toBeNull()
                ->and($value->accountIMRate)
                ->toBeNull()
                ->and($value->accountMMRate)
                ->toBeNull()
                ->and($value->totalEquity)
                ->toBeFloat()
                ->and($value->totalWalletBalance)
                ->toBeFloat()
                ->and($value->totalMarginBalance)
                ->toBeNull()
                ->and($value->totalAvailableBalance)
                ->toBeNull()
                ->and($value->totalPerpUPL)
                ->toBeFloat()
                ->and($value->totalInitialMargin)
                ->toBeNull()
                ->and($value->totalMaintenanceMargin)
                ->toBeNull()
                ->and($value->coins)
                ->toHaveCount(2)
                ->each(function (Expectation $e) {
                    /** @var \BybitApi\DTOs\Account\Balance\Coin $value */
                    $value = $e->value;
                    expect($value)
                        ->toBeInstanceOf(Balance\Coin::class)
                        ->and($value->coin)
                        ->toBeString()
                        ->and($value->equity)
                        ->toBeFloat()
                        ->and($value->usdValue)
                        ->toBeFloat()
                        ->and($value->walletBalance)
                        ->toBeFloat()
                        ->and($value->spotHedgingQty)
                        ->toBeFloat()
                        ->and($value->borrowAmount)
                        ->toBeFloat()
                        ->and($value->availableToWithdraw)
                        ->toBeNull()
                        ->and($value->accruedInterest)
                        ->toBeFloat()
                        ->and($value->totalOrderIM)
                        ->toBeFloat()
                        ->and($value->totalPositionIM)
                        ->toBeFloat()
                        ->and($value->totalPositionMM)
                        ->toBeFloat()
                        ->and($value->unrealisedPnl)
                        ->toBeFloat()
                        ->and($value->cumRealisedPnl)
                        ->toBeFloat()
                        ->and($value->bonus)
                        ->toBeFloat()
                        ->and($value->marginCollateral)
                        ->toBeBool()
                        ->and($value->collateralSwitch)
                        ->toBeBool()
                        ->and($value->availableToBorrow)
                        ->toBeNull();
                });
        });
});
