<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\TradeMode;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchCrossIsolatedMargin;
use BybitApi\Tests\Fixtures\Bybit\Position\SwitchCrossIsolatedMargin\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true when it was switched', function () {
    MockClient::global([
        SwitchCrossIsolatedMargin::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->switchCrossIsolatedMargin(Category::LINEAR, 'BTCUSDT', TradeMode::CROSS_MARGIN, 10, 10);

    expect($result)
        ->toBeTrue();
});
