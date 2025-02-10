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
 * @link https://bybit-exchange.github.io/docs/v5/asset/transfer/create-inter-transfer
 */
class CreateInternalTransfer extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public BackedEnum|string $coin,
        public string $amount,
        public AccountType $fromAccountType,
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
        return '/v5/asset/transfer/inter-transfer';
    }

    protected function defaultBody(): array
    {
        return [
            'transferId' => $this->transferId,
            'coin' => $this->coin,
            'amount' => $this->amount,
            'fromAccountType' => $this->fromAccountType,
            'toAccountType' => $this->toAccountType,
        ];
    }

    public function createDtoFromResponse(Response $response): Transfer
    {
        return Transfer::init($response->json('result'));
    }
}
