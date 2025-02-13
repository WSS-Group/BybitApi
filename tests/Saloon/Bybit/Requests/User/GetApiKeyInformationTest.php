<?php

use BybitApi\DTOs\User\ApiKey;
use BybitApi\DTOs\User\Permissions;
use BybitApi\Enums\ApiType;
use BybitApi\Enums\KycLevel;
use BybitApi\Enums\VipLevel;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetApiKeyInformation;
use BybitApi\Tests\Fixtures\Bybit\User\GetApiKeyInformation\OkFixture;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;

it('can get about current api key', function () {
    MockClient::global([
        GetApiKeyInformation::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->getApiKeyInformation();

    expect($result)
        ->toBeInstanceOf(ApiKey::class)
        ->and($result->id)
        ->toBeString()
        ->and($result->note)
        ->toBeString()
        ->and($result->apiKey)
        ->toBeString()
        ->and($result->readOnly)
        ->toBeBool()
        ->and($result->secret)
        ->toBeNull()
        ->and($result->permissions)
        ->toBeInstanceOf(Permissions::class)
        ->and($result->permissions->BlockTrade)
        ->toBeInstanceOf(Permissions\BlockTrade::class)
        ->and($result->ips)
        ->toBeArray()
        ->and($result->type)
        ->toBeInstanceOf(ApiType::class)
        ->and($result->deadlineDay)
        ->toBeInt()
        ->and($result->expiredAt)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->createdAt)
        ->toBeInstanceOf(Carbon::class)
        ->and($result->unified)
        ->toBeInt()
        ->and($result->uta)
        ->toBeBool()
        ->and($result->userID)
        ->toBeInt()
        ->and($result->inviterID)
        ->toBeInt()
        ->and($result->vipLevel)
        ->toBeInstanceOf(VipLevel::class)
        ->and($result->mktMakerLevel)
        ->toBeString()
        ->and($result->affiliateID)
        ->toBeInt()
        ->and($result->rsaPublicKey)
        ->toBeNull()
        ->and($result->isMaster)
        ->toBeBool()
        ->and($result->parentUid)
        ->toBeInt()
        ->and($result->kycLevel)
        ->toBeInstanceOf(KycLevel::class)
        ->and($result->kycRegion)
        ->toBeNull();
});
