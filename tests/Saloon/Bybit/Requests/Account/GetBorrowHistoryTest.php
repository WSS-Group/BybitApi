<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Account\BorrowHistory;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetBorrowHistory;
use BybitApi\Tests\Fixtures\Bybit\Account\GetBorrowHistory\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get borrow history', function () {
    MockClient::global([
        GetBorrowHistory::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getBorrowHistory();

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\BorrowHistory $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(BorrowHistory::class)
                ->and($value->currency)
                ->toBeString()
                ->and($value->createdTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($value->borrowCost)
                ->toBeFloat()
                ->and($value->hourlyBorrowRate)
                ->toBeFloat()
                ->and($value->InterestBearingBorrowSize)
                ->toBeFloat()
                ->and($value->costExemption)
                ->toBeFloat()
                ->and($value->borrowAmount)
                ->toBeFloat()
                ->and($value->unrealisedLoss)
                ->toBeFloat()
                ->and($value->freeBorrowedAmount)
                ->toBeFloat();
        });
});
