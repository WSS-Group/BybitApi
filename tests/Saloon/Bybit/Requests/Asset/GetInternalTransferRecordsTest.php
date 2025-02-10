<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\TransferRecord;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetInternalTransferRecords;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetInternalTransferRecords\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a list of transfers', function () {
    MockClient::global([
        GetInternalTransferRecords::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getInternalTransferRecords();

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Asset\TransferRecord $transfer */
            $transfer = $e->value;
            expect($transfer)
                ->toBeInstanceOf(TransferRecord::class)
                ->and($transfer->transferId)
                ->toBeString()
                ->and($transfer->coin)
                ->toBeString()
                ->and($transfer->amount)
                ->toBeFloat()
                ->and($transfer->fromAccountType)
                ->toBeInstanceOf(AccountType::class)
                ->and($transfer->toAccountType)
                ->toBeInstanceOf(AccountType::class)
                ->and($transfer->timestamp)
                ->toBeInstanceOf(Carbon::class)
                ->toEqual(today())
                ->and($transfer->status)
                ->toBeInstanceOf(TransferStatus::class);
        });

});
