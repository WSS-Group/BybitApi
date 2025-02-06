<?php

use BybitApi\CursorCollection;
use BybitApi\Enums\Category;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetClosedPNL;
use BybitApi\Tests\Fixtures\Bybit\Position\GetClosedPNL\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can return position info', function () {
    MockClient::global([
        GetClosedPNL::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())->getClosedPnL(Category::LINEAR);

    expect($result)
        ->toBeInstanceOf(CursorCollection::class)
        ->toHaveCount(3)
        ->and($result->first())
        ->toBeInstanceOf(\BybitApi\DTOs\Position\ClosePNL::class)
        ->and($result->first()->symbol)
        ->toBe('BTCUSDT');
});
