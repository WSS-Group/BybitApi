<?php

use BybitApi\Enums\Category;
use BybitApi\Facades\Position;
use BybitApi\Http\Integrations\Bybit\Requests\Position\ConfirmNewRiskLimit;
use BybitApi\Tests\Fixtures\Bybit\Position\ConfirmNewRiskLimit\OkFixture;
use Saloon\Http\Faking\MockClient;

it('return true when it was confirmed', function () {
    MockClient::global([
        ConfirmNewRiskLimit::class => OkFixture::call(),
    ]);

    $result = Position::actingAs($this->defaultActor())
        ->confirmNewRiskLimit(Category::LINEAR, 'BTCUSDT');

    expect($result)
        ->toBeTrue();
});
