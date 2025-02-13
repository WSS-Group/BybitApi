<?php

namespace BybitApi\Groups;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\AddOrReduceMarginInfo;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\PositionMode;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TradeMode;
use BybitApi\Enums\TriggerBy;
use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Http\Integrations\Bybit\Requests\Position\AddOrReduceMargin;
use BybitApi\Http\Integrations\Bybit\Requests\Position\ConfirmNewRiskLimit;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetClosedPNL;
use BybitApi\Http\Integrations\Bybit\Requests\Position\GetPositionInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetAutoAddMargin;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetLeverage;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SetTradingStop;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchCrossIsolatedMargin;
use BybitApi\Http\Integrations\Bybit\Requests\Position\SwitchPositionMode;
use Illuminate\Support\Carbon;

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
    public function switchCrossIsolatedMargin(
        Category $category,
        BackedEnum|string $symbol,
        TradeMode $tradeMode,
        string $buyLeverage,
        string $sellLeverage,
    ): true {
        return $this->send(new SwitchCrossIsolatedMargin($category, $symbol, $tradeMode, $buyLeverage, $sellLeverage))
            ->dto();
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
    public function setAutoAddMargin(
        Category $category,
        BackedEnum|string $symbol,
        bool $autoAddMargin,
        ?PositionIndex $positionIdx = null,
    ): true {
        return $this->send(new SetAutoAddMargin($category, $symbol, $autoAddMargin, $positionIdx))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/manual-add-margin
     */
    public function addOrReduceMargin(
        Category $category,
        BackedEnum|string $symbol,
        string $margin,
        ?PositionIndex $positionIdx = null,
    ): AddOrReduceMarginInfo {
        return $this->send(new AddOrReduceMargin($category, $symbol, $margin, $positionIdx))->dto();
    }

    /**
     * @return \BybitApi\CursorCollection<int, \BybitApi\DTOs\Position\ClosePNL>
     *
     * @link https://bybit-exchange.github.io/docs/v5/position/close-pnl
     */
    public function getClosedPnL(
        Category $category,
        null|BackedEnum|string $symbol = null,
        ?Carbon $startTime = null,
        ?Carbon $endTime = null,
        ?int $limit = null,
        ?string $cursor = null,
    ): CursorCollection {
        return $this->send(new GetClosedPNL($category, $symbol, $startTime, $endTime, $limit, $cursor))->dto();
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/move-position
     */
    public function movePosition(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/move-position-history
     */
    public function getMovePositionHistory(): never
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
    public function setTakeProfitStopLossMode(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }

    /**
     * @link https://bybit-exchange.github.io/docs/v5/position/set-risk-limit
     * @deprecated
     */
    public function setRiskLimit(): never
    {
        // TODO
        throw new NotImplementedYetException;
    }
}
