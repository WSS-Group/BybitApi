<?php

namespace BybitApi\Groups;


use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\Enums\Category;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo;

class Position extends Group
{
    /**
     * @return \BybitApi\CursorCollection<int, \BybitApi\DTOs\Position\Info>
     *
     * @link https://bybit-exchange.github.io/docs/v5/position
     */
    public function getPositionInfo(
        Category $category,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $baseCoin = null,
        null|BackedEnum|string $settleCoin = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection
    {
        return $this->send(new GetPositionInfo($category, $symbol, $baseCoin, $settleCoin, $limit, $cursor))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/leverage
     */
    public function setLeverage(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link  https://bybit-exchange.github.io/docs/v5/position/cross-isolate
     */
    public function switchCrossIsolatedMargin(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/position-mode
     */
    public function switchPositionMode(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/trading-stop
     */
    public function setTradingStop(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/auto-add-margin
     */
    public function setAutoAddMargin(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/manual-add-margin
     */
    public function addOrReduceMargin(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/close-pnl
     */
    public function getClosedPnL(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/move-position
     */
    public function movePosition(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/move-position-history
     */
    public function getMovePositionHistory(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/confirm-mmr
     */
    public function confirmNewRiskLimit(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/tpsl-mode
     * @deprecated
     */
    public function setTakeProfitStopLossMode(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/set-risk-limit
     * @deprecated
     */
    public function setRiskLimit(): mixed
    {
        // TODO
        throw new NotImplementedYetException;
    }

}
