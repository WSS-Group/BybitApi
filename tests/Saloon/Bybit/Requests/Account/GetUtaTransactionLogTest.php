<?php

use BybitApi\DTOs\Account\TransactionLog;
use BybitApi\Enums\LogType;
use BybitApi\Enums\Side;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetUtaTransactionLog;
use BybitApi\Tests\Fixtures\Bybit\Account\GetUtaTransactionLog\OkFixture;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get logs for uta', function () {
    MockClient::global([
        GetUtaTransactionLog::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getUtaTransactionLog();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\TransactionLog $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(TransactionLog::class)
                ->and($value->id)
                ->toBeString()
                ->and($value->symbol)
                ->toBeNull()
                ->and($value->category)
                ->toBeNull()
                ->and($value->side)
                ->toBeInstanceOf(Side::class)
                ->and($value->transactionTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($value->type)
                ->toBeInstanceOf(LogType::class)
                ->and($value->qty)
                ->toBeFloat()
                ->and($value->size)
                ->toBeFloat()
                ->and($value->currency)
                ->toBeString()
                ->and($value->tradePrice)
                ->toBeFloat()
                ->and($value->funding)
                ->toBeFloat()
                ->and($value->fee)
                ->toBeFloat()
                ->and($value->cashFlow)
                ->toBeFloat()
                ->and($value->change)
                ->toBeFloat()
                ->and($value->cashBalance)
                ->toBeFloat()
                ->and($value->feeRate)
                ->toBeFloat()
                ->and($value->bonusChange)
                ->toBeFloat()
                ->and($value->tradeId)
                ->toBeNull()
                ->and($value->orderId)
                ->toBeNull()
                ->and($value->orderLinkId)
                ->toBeNull();
        });
});
