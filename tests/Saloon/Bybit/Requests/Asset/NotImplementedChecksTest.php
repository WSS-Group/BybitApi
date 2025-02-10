<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\Asset;

it('check if all not implemented tests throw exception', function () {
    $asset = Asset::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\Asset::";

    expect(fn () => $asset->getUSDCSessionSettlement())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getUSDCSessionSettlement'.")
        ->and(fn () => $asset->getAssetInfo())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getAssetInfo'.")
        ->and(fn () => $asset->createUniversalTransfer())
        ->toThrow(NotImplementedYetException::class, "{$commonError}createUniversalTransfer'.")
        ->and(fn () => $asset->getUniversalTransferRecords())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getUniversalTransferRecords'.")
        ->and(fn () => $asset->getAllowedDepositCoinInfo())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getAllowedDepositCoinInfo'.")
        ->and(fn () => $asset->setDepositAccount())
        ->toThrow(NotImplementedYetException::class, "{$commonError}setDepositAccount'.")
        ->and(fn () => $asset->getDepositRecords())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getDepositRecords'.")
        ->and(fn () => $asset->getSubDepositRecords())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getSubDepositRecords'.")
        ->and(fn () => $asset->getInternalDepositRecords())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getInternalDepositRecords'.")
        ->and(fn () => $asset->getMasterDepositAddress())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getMasterDepositAddress'.")
        ->and(fn () => $asset->getSubDepositAddress())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getSubDepositAddress'.")
        ->and(fn () => $asset->getWithdrawalRecords())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getWithdrawalRecords'.")
        ->and(fn () => $asset->getExchangeEntityList())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getExchangeEntityList'.")
        ->and(fn () => $asset->withdraw())
        ->toThrow(NotImplementedYetException::class, "{$commonError}withdraw'.")
        ->and(fn () => $asset->cancelWithdrawal())
        ->toThrow(NotImplementedYetException::class, "{$commonError}cancelWithdrawal'.")
        ->and(fn () => $asset->getConvertCoinList())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getConvertCoinList'.")
        ->and(fn () => $asset->requestAQuote())
        ->toThrow(NotImplementedYetException::class, "{$commonError}requestAQuote'.")
        ->and(fn () => $asset->confirmAQuote())
        ->toThrow(NotImplementedYetException::class, "{$commonError}confirmAQuote'.")
        ->and(fn () => $asset->getConvertStatus())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getConvertStatus'.")
        ->and(fn () => $asset->getConvertHistory())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getConvertHistory'.");
});
