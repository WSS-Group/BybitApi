<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\WithdrawalRecord;
use BybitApi\Enums\WithdrawStatus;
use BybitApi\Enums\WithdrawType;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetWithdrawalRecords;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetWithdrawalRecords\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a list of withdrawal records', function () {
    MockClient::global([
        GetWithdrawalRecords::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getWithdrawalRecords();

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Asset\WithdrawalRecord $record */
            $record = $e->value;
            expect($record)
                ->toBeInstanceOf(WithdrawalRecord::class)
                ->and($record->coin)
                ->toBeString()
                ->and($record->chain)
                ->toBeString()
                ->and($record->amount)
                ->toBeFloat()
                ->and($record->txID)
                ->toBeNull()
                ->and($record->status)
                ->toBeInstanceOf(WithdrawStatus::class)
                ->and($record->toAddress)
                ->toBeString()
                ->and($record->tag)
                ->toBeNull()
                ->and($record->withdrawFee)
                ->toBeFloat()
                ->and($record->createTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($record->updateTime)
                ->toBeInstanceOf(Carbon::class)
                ->and($record->withdrawId)
                ->toBeString()
                ->and($record->withdrawType)
                ->toBeInstanceOf(WithdrawType::class);
        });

});
