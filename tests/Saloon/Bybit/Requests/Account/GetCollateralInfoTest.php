<?php

use BybitApi\DTOs\Account\CollateralInfo;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetCollateralInfo;
use BybitApi\Tests\Fixtures\Bybit\Account\GetCollateralInfo\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get collateral info about a currencies', function () {
    MockClient::global([
        GetCollateralInfo::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getCollateralInfo();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(3)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\CollateralInfo $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(CollateralInfo::class)
                ->and($value->currency)
                ->toBeString()
                ->and($value->hourlyBorrowRate)
                ->toBeFloat()
                ->and($value->maxBorrowingAmount)
                ->toBeFloat()
                ->and($value->freeBorrowingLimit)
                ->toBeFloat()
                ->and($value->freeBorrowAmount)
                ->toBeFloat()
                ->and($value->borrowAmount)
                ->toBeFloat()
                ->and($value->otherBorrowAmount)
                ->toBeFloat()
                ->and($value->freeBorrowingAmount)
                ->toBeNull()
                ->and($value->availableToBorrow)
                ->toBeFloat()
                ->and($value->borrowable)
                ->toBeBool()
                ->and($value->borrowUsageRate)
                ->toBeFloat()
                ->and($value->marginCollateral)
                ->toBeBool()
                ->and($value->collateralSwitch)
                ->toBeBool()
                ->and($value->collateralRatio)
                ->toBeFloat();
        });
});
