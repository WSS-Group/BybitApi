<?php

use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\DeliveryRecord;
use BybitApi\Enums\Category;
use BybitApi\Facades\Asset;
use BybitApi\Http\Integrations\Bybit\Requests\Asset\GetDeliveryRecord;
use BybitApi\Tests\Fixtures\Bybit\Asset\GetDeliveryRecord\OkFixture;
use Illuminate\Support\Carbon;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('return a delivery record list', function () {
    MockClient::global([
        GetDeliveryRecord::class => OkFixture::call(),
    ]);

    $result = Asset::actingAs($this->defaultActor())->getDeliveryRecord(Category::LINEAR);

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->each(function (Expectation $e) {
            $e->toBeInstanceOf(DeliveryRecord::class);
            expect($e->value->deliveryTime)
                ->toBeInstanceOf(Carbon::class);
        });
});
