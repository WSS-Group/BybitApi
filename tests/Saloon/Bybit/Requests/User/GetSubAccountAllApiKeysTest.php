<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\User\Permissions;
use BybitApi\DTOs\User\SubApiKey;
use BybitApi\Enums\ApiStatus;
use BybitApi\Enums\ApiType;
use BybitApi\Facades\User;
use BybitApi\Http\Integrations\Bybit\Requests\User\GetSubAccountAllApiKeys;
use BybitApi\Tests\Fixtures\Bybit\User\GetSubAccountAllApiKeys\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get about current api key', function () {
    MockClient::global([
        GetSubAccountAllApiKeys::class => OkFixture::call(),
    ]);

    $result = User::actingAs($this->defaultActor())->getSubAccountAllApiKeys('21321');

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(1)
        ->each(function (Expectation $e) {
            /** @var SubApiKey $dto */
            $dto = $e->value;
            $e->toBeInstanceOf(SubApiKey::class)
                ->and($dto->id)
                ->toBeString()
                ->and($dto->ips)
                ->toBeArray()
                ->not
                ->toBeEmpty()
                ->and($dto->apiKey)
                ->toBeString()
                ->and($dto->note)
                ->toBeString()
                ->and($dto->status)
                ->toBeInstanceOf(ApiStatus::class)
                ->and($dto->expiredAt)
                ->toBeInstanceOf(Carbon::class)
                ->and($dto->createdAt)
                ->toBeInstanceOf(Carbon::class)
                ->and($dto->type)
                ->toBeInstanceOf(ApiType::class)
                ->and($dto->permissions)
                ->toBeInstanceOf(Permissions::class)
                ->and($dto->secret)
                ->toBeString()
                ->and($dto->readOnly)
                ->toBeBool()
                ->and($dto->deadlineDay)
                ->toBeInt()
                ->and($dto->flag)
                ->toBeString();
        });
});
