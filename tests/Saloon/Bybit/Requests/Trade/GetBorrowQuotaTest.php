<?php

use BybitApi\DTOs\Trade\BorrowQuota;
use BybitApi\Enums\Category;
use BybitApi\Enums\Side;
use BybitApi\Facades\Trade;
use BybitApi\Http\Integrations\Bybit\Requests\Trade\GetBorrowQuota;
use BybitApi\Tests\Fixtures\Bybit\Trade\GetBorrowQuota\OkFixture;
use Saloon\Http\Faking\MockClient;

it('can get borrow quota', function () {
    MockClient::global([
        GetBorrowQuota::class => OkFixture::call(),
    ]);
    $result = Trade::actingAs($this->defaultActor())->getBorrowQuota(
        Category::SPOT,
        'BTCUSDT',
        Side::BUY
    );
    expect($result)
        ->toBeInstanceOf(BorrowQuota::class)
        ->and($result->symbol)
        ->toBe('BTCUSDT');
});
