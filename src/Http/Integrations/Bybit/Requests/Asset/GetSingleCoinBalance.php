<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Asset\SingleCoinBalance;
use BybitApi\Enums\AccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/balance/account-coin-balance
 */
class GetSingleCoinBalance extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public ?int $withBonusInt {
        get => ($this->withBonus === null ? null : (int) $this->withBonus);
    }

    public ?int $withTransferSafeAmountInt {
        get => ($this->withTransferSafeAmount === null ? null : (int) $this->withTransferSafeAmount);
    }

    public ?int $withLtvTransferSafeAmountInt {
        get => ($this->withLtvTransferSafeAmount === null ? null : (int) $this->withLtvTransferSafeAmount);
    }

    public function __construct(
        public AccountType $accountType,
        public BackedEnum|string $coin,
        public ?string $memberId = null,
        public ?AccountType $toAccountType = null,
        public ?string $toMemberId = null,
        public ?bool $withBonus = null,
        public ?bool $withTransferSafeAmount = null,
        public ?bool $withLtvTransferSafeAmount = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/transfer/query-account-coin-balance';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'accountType' => $this->accountType,
            'coin' => $this->coin,
            'memberId' => Conditional::ifNotEmpty($this->memberId),
            'toMemberId' => Conditional::ifNotEmpty($this->toMemberId),
            'toAccountType' => Conditional::ifNotNull($this->toAccountType),
            'withBonus' => Conditional::ifNotNull($this->withBonusInt),
            'withTransferSafeAmount' => Conditional::ifNotNull($this->withTransferSafeAmountInt),
            'withLtvTransferSafeAmount' => Conditional::ifNotNull($this->withLtvTransferSafeAmountInt),
        ]);
    }

    public function createDtoFromResponse(Response $response): SingleCoinBalance
    {
        return SingleCoinBalance::init($response->json('result'));
    }
}
