<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BackedEnum;
use BybitApi\DTOs\Trade\BorrowQuota;
use BybitApi\Enums\Category;
use BybitApi\Enums\Side;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/spot-borrow-quota
 */
class GetBorrowQuota extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public Side $side,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/spot-borrow-check';
    }

    protected function defaultQuery(): array
    {
        return [
            'category' => $this->category,
            'symbol' => $this->symbol,
            'side' => $this->side,
        ];
    }

    public function createDtoFromResponse(Response $response): BorrowQuota
    {
        return BorrowQuota::init($response->json('result'));
    }
}
