<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Attributes\AtLeastOneParameterRequired;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position
 */
#[AtLeastOneParameterRequired('symbol', 'baseCoin', 'settleCoin')]
class GetPositionInfo extends Request
{

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public null|BackedEnum|string $symbol = null,
        public null|BackedEnum|string $baseCoin = null,
        public null|BackedEnum|string $settleCoin = null,
        public ?int $limit = null,
        public ?string $cursor = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/list';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => Conditional::ifNotEmpty($this->symbol),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'settleCoin' => Conditional::ifNotEmpty($this->settleCoin),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.list'),
            Info::class,
            $response->json('result.nextPageCursor')
        );
    }
}
