<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\DTOs\Asset\Transfer;
use BybitApi\Enums\AccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Str;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/unitransfer
 */
class CreateUniversalTransfer extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public BackedEnum|string $coin,
        public string $amount,
        public int $fromMemberId,
        public AccountType $fromAccountType,
        public int $toMemberId,
        public AccountType $toAccountType,
        public ?string $transferId = null,
    ) {
        $this->transferId ??= Str::uuid()->toString();
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/transfer/universal-transfer';
    }

    protected function defaultBody(): array
    {
        return [
            'transferId' => $this->transferId,
            'coin' => $this->coin,
            'amount' => $this->amount,
            'fromAccountType' => $this->fromAccountType,
            'toAccountType' => $this->toAccountType,
            'fromMemberId' => $this->fromMemberId,
            'toMemberId' => $this->toMemberId,
        ];
    }

    public function createDtoFromResponse(Response $response): Transfer
    {
        return Transfer::init($response->json('result'));
    }
}
