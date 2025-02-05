<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Attributes\AtLeastOneParameterRequired;
use BybitApi\Conditional;
use BybitApi\DTOs\Trade\AmendedOrder;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionMode;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/position-mode
 */
#[AtLeastOneParameterRequired('symbol', 'coin')]
class SwitchPositionMode extends Request implements HasBody, BypassCodes
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public PositionMode $mode,
        public null|BackedEnum|string $symbol = null,
        public null|BackedEnum|string $coin = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/switch-mode';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'mode' => $this->mode,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'coin' => Conditional::ifNotEmpty($this->coin),
        ]);
    }

    public function createDtoFromResponse(Response $response): true
    {
        return in_array($response->json('retCode'), [0, 110025]);
    }

    public function bypassCodes(): array
    {
        return [110025];
    }
}
