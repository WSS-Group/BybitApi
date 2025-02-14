<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Account\CollateralInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/collateral-info
 */
class GetCollateralInfo extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public null|BackedEnum|string $currency = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/collateral-info';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'currency' => Conditional::ifNotEmpty($this->currency),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'currency') => CollateralInfo::init($data)]);
    }
}
