<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\DTOs\Account\MmpState;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/get-mmp-state
 */
class GetMmpState extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public BackedEnum|string $baseCoin,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/mmp-state';
    }

    protected function defaultQuery(): array
    {
        return [
            'baseCoin' => $this->baseCoin,
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.result'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'baseCoin') => MmpState::init($data)]);
    }
}
