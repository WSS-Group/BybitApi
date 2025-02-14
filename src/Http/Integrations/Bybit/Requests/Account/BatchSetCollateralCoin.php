<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\DTOs\Account\ChangedCollateral;
use BybitApi\Http\Integrations\Bybit\Entities\Account\CollateralCoin;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/batch-set-collateral
 */
class BatchSetCollateralCoin extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * @var Collection<int, CollateralCoin>
     */
    public Collection $coins;

    public function __construct(
        CollateralCoin ...$coins
    ) {
        $this->coins = collect($coins);
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/set-collateral-switch-batch';
    }

    protected function defaultBody(): array
    {
        return [
            'request' => $this->coins->toArray(),
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'coin') => ChangedCollateral::init($data)]);
    }
}
