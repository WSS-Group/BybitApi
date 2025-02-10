<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\Conditional;
use BybitApi\DTOs\Asset\ConvertStatus;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-history
 */
class GetConvertHistory extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ?ConvertAccountType $accountType = null,
        public ?int $index = null,
        public ?int $limit = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/query-convert-history';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => Conditional::ifNotNull($this->accountType),
            'index' => Conditional::ifNotNull($this->index),
            'limit' => Conditional::ifNotNull($this->limit),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->map(fn (array $data) => ConvertStatus::init($data));
    }
}
