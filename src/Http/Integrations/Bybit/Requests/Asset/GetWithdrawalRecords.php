<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\WithdrawalRecord;
use BybitApi\Enums\WithdrawType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/withdraw-record
 */
class GetWithdrawalRecords extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ?string $withdrawID = null,
        public ?string $txID = null,
        public null|BackedEnum|string $coin = null,
        public ?WithdrawType $withdrawType = null,
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
        return '/v5/asset/withdraw/query-record';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'withdrawID' => Conditional::ifNotEmpty($this->withdrawID),
            'txID' => Conditional::ifNotEmpty($this->txID),
            'coin' => Conditional::ifNotEmpty($this->coin),
            'withdrawType' => Conditional::ifNotNull($this->withdrawType),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'limit' => Conditional::ifNotEmpty($this->limit),
            'cursor' => Conditional::ifNotEmpty($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.rows'),
            WithdrawalRecord::class,
            $response->json('result.nextPageCursor')
        );
    }
}
