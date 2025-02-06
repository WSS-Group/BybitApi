<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Enums\Category;
use BybitApi\Enums\TradeMode;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/cross-isolate
 */
class SwitchCrossIsolatedMargin extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public TradeMode $tradeMode,
        public string $buyLeverage,
        public string $sellLeverage,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/switch-isolated';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            'symbol' => $this->symbol,
            'tradeMode' => $this->tradeMode,
            'buyLeverage' => $this->buyLeverage,
            'sellLeverage' => $this->sellLeverage,
        ];
    }

    public function createDtoFromResponse(Response $response): true
    {
        return $response->json('retCode') === 0;
    }
}
