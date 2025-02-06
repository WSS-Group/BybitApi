<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionIndex;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/auto-add-margin
 */
class SetAutoAddMargin extends Request implements BypassCodes, HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public bool $autoAddMargin,
        public ?PositionIndex $positionIdx = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/set-auto-add-margin';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => $this->symbol,
            'autoAddMargin' => $this->autoAddMargin ? 1 : 0,
            'positionIdx' => Conditional::ifNotNull($this->positionIdx),
        ]);
    }

    public function createDtoFromResponse(Response $response): true
    {
        return in_array($response->json('retCode'), [0, 10001]);
    }

    public function bypassCodes(): array
    {
        return [10001];
    }
}
