<?php

use BybitApi\DTOs\Account\UpgradeResult;
use BybitApi\Enums\UnifiedUpgradeStatus;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\UpgradeToUnifiedAccount;
use BybitApi\Tests\Fixtures\Bybit\Account\UpgradeToUnifiedAccount\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can upgrade account', function () {
    MockClient::global([
        UpgradeToUnifiedAccount::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->upgradeToUnifiedAccount();

    expect($result)
        ->toBeInstanceOf(UpgradeResult::class)
        ->and($result->unifiedUpdateStatus)
        ->toBeInstanceOf(UnifiedUpgradeStatus::class)
        ->and($result->unifiedUpdateMsg)
        ->toBeArray();
});
