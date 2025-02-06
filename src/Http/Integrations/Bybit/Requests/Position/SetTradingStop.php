<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Attributes\AtLeastOneParameterRequired;
use BybitApi\Conditional;
use BybitApi\Enums\Category;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\PositionIndex;
use BybitApi\Enums\TakeProfitStopLossMode;
use BybitApi\Enums\TriggerBy;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/trading-stop
 */
#[AtLeastOneParameterRequired('takeProfit', 'stopLoss', 'trailingStop')]
class SetTradingStop extends Request implements BypassCodes, HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public TakeProfitStopLossMode $tpslMode,
        public PositionIndex $positionIdx,
        public ?string $takeProfit = null,
        public ?string $stopLoss = null,
        public ?string $trailingStop = null,
        public ?TriggerBy $tpTriggerBy = null,
        public ?TriggerBy $slTriggerBy = null,
        public ?string $activePrice = null,
        public ?string $tpSize = null,
        public ?string $slSize = null,
        public ?string $tpLimitPrice = null,
        public ?string $slLimitPrice = null,
        public ?OrderType $tpOrderType = null,
        public ?OrderType $slOrderType = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/trading-stop';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => $this->symbol,
            'tpslMode' => $this->tpslMode,
            'positionIdx' => $this->positionIdx,
            'takeProfit' => Conditional::ifNotNull($this->takeProfit),
            'stopLoss' => Conditional::ifNotNull($this->stopLoss),
            'trailingStop' => Conditional::ifNotNull($this->trailingStop),
            'tpTriggerBy' => Conditional::ifNotNull($this->tpTriggerBy),
            'slTriggerBy' => Conditional::ifNotNull($this->slTriggerBy),
            'activePrice' => Conditional::ifNotEmpty($this->activePrice),
            'tpSize' => Conditional::ifNotEmpty($this->tpSize),
            'slSize' => Conditional::ifNotEmpty($this->slSize),
            'tpLimitPrice' => Conditional::ifNotEmpty($this->tpLimitPrice),
            'slLimitPrice' => Conditional::ifNotEmpty($this->slLimitPrice),
            'tpOrderType' => Conditional::ifNotNull($this->tpOrderType),
            'slOrderType' => Conditional::ifNotNull($this->slOrderType),
        ]);
    }

    public function createDtoFromResponse(Response $response): true
    {
        return in_array($response->json('retCode'), [0, 34040]);
    }

    public function bypassCodes(): array
    {
        return [34040];
    }
}
