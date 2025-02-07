<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Asset\AllCoinsBalance;
use BybitApi\Enums\AccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/balance/all-balance
 */
class GetAllCoinsBalance extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public ?int $withBonusInt {
        get => ($this->withBonus === null ? null : (int) $this->withBonus);
    }

    public function __construct(
        public AccountType $accountType,
        public null|BackedEnum|string $coin = null,
        public ?string $memberId = null,
        public ?bool $withBonus = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/transfer/query-account-coins-balance';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => $this->accountType,
            'memberId' => Conditional::ifNotEmpty($this->memberId),
            'coin' => Conditional::ifNotEmpty($this->coin),
            'withBonus' => Conditional::ifNotNull($this->withBonusInt),
        ]);
    }

    public function createDtoFromResponse(Response $response): AllCoinsBalance
    {
        return AllCoinsBalance::init($response->json('result'));
    }
}
