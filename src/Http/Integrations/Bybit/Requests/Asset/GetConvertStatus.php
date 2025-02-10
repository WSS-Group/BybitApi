<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\DTOs\Asset\ConvertStatus;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/convert/get-convert-result
 */
class GetConvertStatus extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public string $quoteTxId,
        public ConvertAccountType $accountType,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/convert-result-query';
    }

    protected function defaultQuery(): array
    {
        return [
            'quoteTxId' => $this->quoteTxId,
            'accountType' => $this->accountType,
        ];
    }

    public function createDtoFromResponse(Response $response): ConvertStatus
    {
        return ConvertStatus::init($response->json('result.result'));
    }
}
