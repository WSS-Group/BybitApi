<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Account\Balance;
use BybitApi\Enums\AccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/wallet-balance
 */
class GetWalletBalance extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public AccountType $accountType,
        public null|BackedEnum|string $coin = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/wallet-balance';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => $this->accountType,
            'coin' => Conditional::ifNotEmpty($this->coin),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->map(fn (array $data) => Balance::init($data));
    }
}
