<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\DTOs\User\WalletType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/wallet-type
 */
class GetUIDWalletType extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public ?string $memberIdsString {
        get => ($this->memberIds === null ? null : implode(',', $this->memberIds));
    }

    public function __construct(
        public ?array $memberIds = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/get-member-type';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'memberIds' => Conditional::ifNotNull($this->memberIdsString),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.accounts'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'uid') => WalletType::init($data)]);
    }
}
