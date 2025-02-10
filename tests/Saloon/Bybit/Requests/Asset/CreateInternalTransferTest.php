<?php

use BybitApi\DTOs\Asset\Transfer;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateInternalTransfer;
use BybitApi\Tests\Fixtures\Bybit\Asset\CreateInternalTransfer\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can create an internal transfer', function () {
    MockClient::global([
        CreateInternalTransfer::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->createInternalTransfer(
        'BTC',
        '0.5',
        AccountType::FUND,
        AccountType::UNIFIED,
    );

    expect($result)
        ->toBeInstanceOf(Transfer::class)
        ->and($result->transferId)
        ->toBeUuid()
        ->and($result->status)
        ->toBeInstanceOf(TransferStatus::class)
        ->toBe(TransferStatus::SUCCESS);

});
