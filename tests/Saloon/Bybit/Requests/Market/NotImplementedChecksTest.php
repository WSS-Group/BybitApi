<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Market;

it('check if all not implemented tests throw exception', function () {
    $market = Market::actingAs($this->defaultActor());

    expect(fn () => $market->getIndexPriceKline())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getIndexPriceKline'.")
        ->and(fn () => $market->getPremiumIndexPriceKline())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getPremiumIndexPriceKline'.")
        ->and(fn () => $market->getOrderBook())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getOrderBook'.")
        ->and(fn () => $market->getFundingRateHistory())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getFundingRateHistory'.")
        ->and(fn () => $market->getPublicRecentTradingHistory())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getPublicRecentTradingHistory'.")
        ->and(fn () => $market->getOpenInterest())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getOpenInterest'.")
        ->and(fn () => $market->getHistoricalVolatility())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getHistoricalVolatility'.")
        ->and(fn () => $market->getInsurance())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getInsurance'.")
        ->and(fn () => $market->getRiskLimit())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getRiskLimit'.")
        ->and(fn () => $market->getDeliveryPrice())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getDeliveryPrice'.")
        ->and(fn () => $market->getLongShortRatio())
        ->toThrow(NotImplementedYetException::class,
            "Endpoint not implemented yet on 'BybitApi\Groups\Market::getLongShortRatio'.");
});
