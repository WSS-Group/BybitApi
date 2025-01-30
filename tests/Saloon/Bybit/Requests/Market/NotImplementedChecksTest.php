<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Market;

it('check if all not implemented tests throw exception', function () {
    $market = Market::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Market::";

    expect(fn () => $market->getOrderBook())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getOrderBook'.")
        ->and(fn () => $market->getFundingRateHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getFundingRateHistory'.")
        ->and(fn () => $market->getPublicRecentTradingHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getPublicRecentTradingHistory'.")
        ->and(fn () => $market->getOpenInterest())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getOpenInterest'.")
        ->and(fn () => $market->getHistoricalVolatility())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getHistoricalVolatility'.")
        ->and(fn () => $market->getInsurance())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getInsurance'.")
        ->and(fn () => $market->getRiskLimit())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getRiskLimit'.")
        ->and(fn () => $market->getDeliveryPrice())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getDeliveryPrice'.")
        ->and(fn () => $market->getLongShortRatio())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getLongShortRatio'.");
});
