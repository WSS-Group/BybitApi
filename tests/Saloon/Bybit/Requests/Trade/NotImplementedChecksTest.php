<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Trade;

it('check if all not implemented tests throw exception', function () {
    $trade = Trade::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Trade::";

    expect(fn () => $trade->amendOrder())
        ->toThrow(NotImplementedYetException::class, "{$commonError}amendOrder'.")
        ->and(fn () => $trade->cancelOrder())
        ->toThrow(NotImplementedYetException::class, "{$commonError}cancelOrder'.")
        ->and(fn () => $trade->getRealTimeOrders())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getRealTimeOrders'.")
        ->and(fn () => $trade->cancelAllOrders())
        ->toThrow(NotImplementedYetException::class, "{$commonError}cancelAllOrders'.")
        ->and(fn () => $trade->getOrderHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getOrderHistory'.")
        ->and(fn () => $trade->getTradeHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getTradeHistory'.")
        ->and(fn () => $trade->batchAmendOrder())
        ->toThrow(NotImplementedYetException::class, "{$commonError}batchAmendOrder'.")
        ->and(fn () => $trade->batchCancelOrder())
        ->toThrow(NotImplementedYetException::class, "{$commonError}batchCancelOrder'.")
        ->and(fn () => $trade->getBorrowQuota())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getBorrowQuota'.")
        ->and(fn () => $trade->setDisconnectCancelAll())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setDisconnectCancelAll'.");
});
