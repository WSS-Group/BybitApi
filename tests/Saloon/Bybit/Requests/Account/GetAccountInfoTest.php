<?php

use BybitApi\DTOs\Account\AccountInfo;
use BybitApi\Enums\MarginMode;
use BybitApi\Enums\SpotHedgingStatus;
use BybitApi\Enums\UnifiedMarginStatus;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetAccountInfo;
use BybitApi\Tests\Fixtures\Bybit\Account\GetAccountInfo\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('can get information about account', function () {
    MockClient::global([
        GetAccountInfo::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getAccountInfo();

    expect($result)
        ->toBeInstanceOf(AccountInfo::class)
        ->and($result->unifiedMarginStatus)
        ->toBeInstanceOf(UnifiedMarginStatus::class)
        ->and($result->marginMode)
        ->toBeInstanceOf(MarginMode::class)
        ->and($result->isMasterTrader)
        ->toBeBool()
        ->and($result->spotHedgingStatus)
        ->toBeInstanceOf(SpotHedgingStatus::class)
        ->and($result->updatedTime)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->dcpStatus)
        ->toBeString()
        ->and($result->timeWindow)
        ->toBeInt()
        ->and($result->smpGroup)
        ->toBeInt();
});
