<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/withdraw/cancel-withdraw
 */
class CancelWithdrawal extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $id,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/withdraw/cancel';
    }

    protected function defaultBody(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('result.status') === 1;
    }
}
