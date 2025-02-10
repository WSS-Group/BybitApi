<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\UniversalTransferRecord;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetUniversalTransferRecords;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetUniversalTransferRecords\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a list of coins info', function () {
    MockClient::global([
        GetUniversalTransferRecords::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getUniversalTransferRecords();

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Asset\UniversalTransferRecord $transfer */
            $transfer = $e->value;
            expect($transfer)
                ->toBeInstanceOf(UniversalTransferRecord::class)
                ->and($transfer->transferId)
                ->toBeString()
                ->and($transfer->coin)
                ->toBeString()
                ->and($transfer->amount)
                ->toBeFloat()
                ->and($transfer->fromMemberId)
                ->toBeInt()
                ->and($transfer->fromAccountType)
                ->toBeInstanceOf(AccountType::class)
                ->and($transfer->toMemberId)
                ->toBeInt()
                ->and($transfer->toAccountType)
                ->toBeInstanceOf(AccountType::class)
                ->and($transfer->timestamp)
                ->toBeInstanceOf(Carbon::class)
                ->toEqual(today())
                ->and($transfer->status)
                ->toBeInstanceOf(TransferStatus::class);
        });

});
