<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Account\TransactionLog;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\Category;
use BybitApi\Enums\LogType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/transaction-log
 */
class GetUtaTransactionLog extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ?AccountType $accountType = null,
        public ?Category $category = null,
        public null|BackedEnum|string $currency = null,
        public null|BackedEnum|string $baseCoin = null,
        public ?LogType $type = null,
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
        return '/v5/account/transaction-log';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => Conditional::ifNotNull($this->accountType),
            'category' => Conditional::ifNotNull($this->category),
            'currency' => Conditional::ifNotEmpty($this->currency),
            'baseCoin' => Conditional::ifNotEmpty($this->baseCoin),
            'type' => Conditional::ifNotNull($this->type),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotNull($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return CursorCollection::init(
            $response->json('result.list'),
            TransactionLog::class,
            $response->json('result.nextPageCursor')
        );
    }
}
