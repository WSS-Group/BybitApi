<?php

use BybitApi\DTOs\Asset\Transfer;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\TransferStatus;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\CreateUniversalTransfer;
use BybitApi\Tests\Fixtures\Bybit\Asset\CreateUniversalTransfer\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can create an universal transfer', function () {
    MockClient::global([
        CreateUniversalTransfer::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->createUniversalTransfer(
        'BTC',
        '0.5',
        1234566,
        AccountType::FUND,
        1234444,
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
