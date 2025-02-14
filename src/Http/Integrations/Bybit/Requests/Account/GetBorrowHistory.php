<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Account\BorrowHistory;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/borrow-history
 */
class GetBorrowHistory extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public null|BackedEnum|string $currency = null,
        public ?Carbon $startTime = null,
        public ?Carbon $endTime = null,
        public ?int $limit = null,
        public ?string $cursor = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/borrow-history';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'currency' => Conditional::ifNotEmpty($this->currency),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {

        return CursorCollection::init(
            $response->json('result.list'),
            BorrowHistory::class,
            $response->json('result.nextPageCursor')
        );
    }
}
