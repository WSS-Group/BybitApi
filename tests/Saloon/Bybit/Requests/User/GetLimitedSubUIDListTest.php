<?php

use BybitApi\DTOs\User\UID;
use BybitApi\Enums\AccountMode;
use BybitApi\Enums\AccountStatus;
use BybitApi\Enums\MemberType;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetLimitedUIDList;
use BybitApi\Tests\Fixtures\Bybit\User\GetLimitedSubUIDList\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can return list of sub uid', function () {
    MockClient::global([
        GetLimitedUIDList::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->getLimitedSubUidList();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(3)
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
