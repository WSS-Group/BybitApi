<?php

use BybitApi\DTOs\Position\AddOrReduceMarginInfo;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionIndex;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\AddOrReduceMargin;
use BybitApi\Tests\Fixtures\Bybit\Position\AddOrReduceMargin\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can return position info', function () {
    MockClient::global([
        AddOrReduceMargin::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())->addOrReduceMargin(
        Category::LINEAR,
        'BTCUSDT',
        '1',
        PositionIndex::EDGE_BUY,
    );

    expect($result)
        ->toBeInstanceOf(AddOrReduceMarginInfo::class)
        ->and($result->symbol)
        ->toBe('BTCUSDT')
        ->and($result->category)
        ->toBe(Category::LINEAR);
});
