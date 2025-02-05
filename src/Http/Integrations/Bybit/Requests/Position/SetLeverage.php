<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/leverage
 */
class SetLeverage extends Request implements BypassCodes, HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public float $buyLeverage,
        public float $sellLeverage,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/set-leverage';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            'symbol' => $this->symbol,
            'buyLeverage' => $this->buyLeverage,
            'sellLeverage' => $this->sellLeverage,
        ];
    }

    public function createDtoFromResponse(Response $response): true
    {
        return in_array($response->json('retCode'), [0, 110043]);
    }

    public function bypassCodes(): array
    {
        return [110043];
    }
}
