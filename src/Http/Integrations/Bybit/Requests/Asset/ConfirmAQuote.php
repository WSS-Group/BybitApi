<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\DTOs\Asset\Convert;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/convert/confirm-quote
 */
class ConfirmAQuote extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $quoteTxId,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/convert-execute';
    }

    protected function defaultBody(): array
    {
        return [
            'quoteTxId' => $this->quoteTxId,
        ];
    }

    public function createDtoFromResponse(Response $response): Convert
    {
        return Convert::init($response->json('result'));
    }
}
