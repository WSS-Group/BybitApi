<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/confirm-mmr
 */
class ConfirmNewRiskLimit extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/confirm-pending-mmr';
    }

    protected function defaultBody(): array
    {
        return [
            'category' => $this->category,
            'symbol' => $this->symbol,
        ];
    }

    public function createDtoFromResponse(Response $response): true
    {
        return $response->json('retCode') === 0;
    }
}
