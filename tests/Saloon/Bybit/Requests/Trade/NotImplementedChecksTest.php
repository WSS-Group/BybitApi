<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Trade;

it('check if all not implemented tests throw exception', function () {
    $trade = Trade::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Trade::";

    expect(fn () => $trade->getRealTimeOrders())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getRealTimeOrders'.")
        ->and(fn () => $trade->getOrderHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getOrderHistory'.")
        ->and(fn () => $trade->getTradeHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getTradeHistory'.")
        ->and(fn () => $trade->setDisconnectCancelAll())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setDisconnectCancelAll'.");
});
