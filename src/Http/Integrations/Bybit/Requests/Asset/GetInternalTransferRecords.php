<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Asset\TransferRecord;
use BybitApi\Enums\TransferStatus;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/inter-transfer-list
 */
class GetInternalTransferRecords extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ?string $transferId = null,
        public null|BackedEnum|string $coin = null,
        public ?TransferStatus $status = null,
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
        return '/v5/asset/transfer/query-inter-transfer-list';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'transferId' => Conditional::ifNotEmpty($this->transferId),
            'coin' => Conditional::ifNotEmpty($this->coin),
            'status' => Conditional::ifNotNull($this->status),
            'startTime' => Conditional::ifNotNull($this->startTime),
            'endTime' => Conditional::ifNotNull($this->endTime),
            'limit' => Conditional::ifNotEmpty($this->limit),
            'cursor' => Conditional::ifNotEmpty($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.list'),
            TransferRecord::class,
            $response->json('result.nextPageCursor')
        );
    }
}
