<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\Enums\AccountType;
use BybitApi\Enums\FeeType;
use BybitApi\Http\Integrations\Bybit\Entities\Assets\Beneficiary;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw
 */
class Withdraw extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public BackedEnum|string $coin,
        public string $address,
        public string $amount,
        public Carbon $timestamp,
        public ?string $chain = null,
        public ?string $tag = null,
        public ?int $forceChain = null,
        public ?AccountType $accountType = null,
        public ?FeeType $feeType = null,
        public ?string $requestId = null,
        public ?Beneficiary $beneficiary = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/withdraw/create';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'coin' => $this->coin,
            'chain' => Conditional::ifNotEmpty($this->chain),
            'address' => $this->address,
            'tag' => Conditional::ifNotEmpty($this->tag),
            'amount' => $this->amount,
            'timestamp' => $this->timestamp,
            'forceChain' => Conditional::ifNotNull($this->forceChain),
            'accountType' => Conditional::ifNotNull($this->accountType),
            'feeType' => Conditional::ifNotNull($this->feeType),
            'requestId' => Conditional::ifNotEmpty($this->requestId),
            'beneficiary' => Conditional::ifNotNull($this->beneficiary?->toArray()),
        ]);
    }

    public function createDtoFromResponse(Response $response): string
    {
        return $response->json('result.id');
    }
}
