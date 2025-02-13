<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\UID;
use BybitApi\Enums\AccountMode;
use BybitApi\Enums\AccountStatus;
use BybitApi\Enums\MemberType;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetUnlimitedUIDList;
use BybitApi\Tests\Fixtures\Bybit\User\GetUnlimitedSubUIDList\OkFixture;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can return list of sub uid', function () {
    MockClient::global([
        GetUnlimitedUIDList::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->getUnlimitedSubUidList(2);

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            expect($e->value)
                ->toBeInstanceOf(UID::class)
                ->and($e->value->uid)
                ->toBeString()
                ->and($e->value->username)
                ->toBeString()
                ->and($e->value->memberType)
                ->toBeInstanceOf(MemberType::class)
                ->and($e->value->status)
                ->toBeInstanceOf(AccountStatus::class)
                ->and($e->value->accountMode)
                ->toBeInstanceOf(AccountMode::class)
                ->and($e->value->remark)
                ->toBeString();
        });
});
