<?php

namespace BybitApi\Groups;

use BybitApi\Exceptions\NotImplementedYetException;

class Asset extends Group
{
    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/delivery
     */
    public function getDeliveryRecord(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/settlement
     */
    public function getUSDCSessionSettlement(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/exchange
     */
    public function getCoinExchangeRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/coin-info
     */
    public function getCoinInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/sub-uid-list
     */
    public function getSubUID(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/asset-info
     */
    public function getAssetInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/all-balance
     */
    public function getAllCoinsBalance(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/account-coin-balance
     */
    public function getSingleCoinBalance(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/balance/delay-amount
     */
    public function getWithdrawableAmount(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/transferable-coin
     */
    public function getTransferableCoin(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/create-inter-transfer
     */
    public function createInternalTransfer(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/inter-transfer-list
     */
    public function getInternalTransferRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer
     */
    public function createUniversalTransfer(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer-list
     */
    public function getUniversalTransferRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/deposit-coin-spec
     */
    public function getAllowedDepositCoinInfo(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/set-deposit-acct
     */
    public function setDepositAccount(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/deposit-record
     */
    public function getDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/sub-deposit-record
     */
    public function getSubDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/internal-deposit-record
     */
    public function getInternalDepositRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/master-deposit-addr
     */
    public function getMasterDepositAddress(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/deposit/sub-deposit-addr
     */
    public function getSubDepositAddress(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/withdraw-record
     */
    public function getWithdrawalRecords(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/vasp-list
     */
    public function getExchangeEntityList(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw
     */
    public function withdraw(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/cancel-withdraw
     */
    public function cancelWithdrawal(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/convert-coin-list
     */
    public function getConvertCoinList(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/apply-quote
     */
    public function requestAQuote(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/confirm-quote
     */
    public function confirmAQuote(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-result
     */
    public function getConvertStatus(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-history
     */
    public function getConvertHistory(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
