<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionMode;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TriggerBy;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Position\ConfirmNewRiskLimit;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetLeverage;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetTradingStop;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchPositionMode;

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
    ): CursorCollection {
        return $this->send(new GetPositionInfo($category, $symbol, $baseCoin, $settleCoin, $limit, $cursor))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/leverage
     */
    public function setLeverage(
        Category $category,
        BackedEnum|string $symbol,
        float $buyLeverage,
        float $sellLeverage
    ): true {
        return $this->send(new SetLeverage($category, $symbol, $buyLeverage, $sellLeverage))->dto();
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
    public function switchPositionMode(
        Category $category,
        PositionMode $mode,
        null|BackedEnum|string $symbol = null,
        null|BackedEnum|string $coin = null,
    ): true {
        return $this->send(new SwitchPositionMode($category, $mode, $symbol, $coin))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/trading-stop
     */
    public function setTradingStop(
        Category $category,
        BackedEnum|string $symbol,
        TakeProfitStopLossMode $tpslMode,
        PositionIndex $positionIdx,
        ?string $takeProfit = null,
        ?string $stopLoss = null,
        ?string $trailingStop = null,
        ?TriggerBy $tpTriggerBy = null,
        ?TriggerBy $slTriggerBy = null,
        ?string $activePrice = null,
        ?string $tpSize = null,
        ?string $slSize = null,
        ?string $tpLimitPrice = null,
        ?string $slLimitPrice = null,
        ?OrderType $tpOrderType = null,
        ?OrderType $slOrderType = null,
    ): true {
        return $this->send(new SetTradingStop(
            $category, $symbol, $tpslMode, $positionIdx, $takeProfit, $stopLoss, $trailingStop, $tpTriggerBy,
            $slTriggerBy, $activePrice, $tpSize, $slSize, $tpLimitPrice, $slLimitPrice, $tpOrderType, $slOrderType
        ))->dto();
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
    public function confirmNewRiskLimit(Category $category, BackedEnum|string $symbol): true
    {
        return $this->send(new ConfirmNewRiskLimit($category, $symbol))->dto();
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
