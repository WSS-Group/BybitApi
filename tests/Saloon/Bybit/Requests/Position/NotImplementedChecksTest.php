<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Position;

it('check if all not implemented tests throw exception', function () {
    $market = Position::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Position::";

    expect(fn () => $market->movePosition())
        ->toThrow(NotImplementedYetException::class, "{$commonError}movePosition'.")
        ->and(fn () => $market->getMovePositionHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getMovePositionHistory'.")
        ->and(fn () => $market->setTakeProfitStopLossMode())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setTakeProfitStopLossMode'.")
        ->and(fn () => $market->setRiskLimit())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setRiskLimit'.");
});
