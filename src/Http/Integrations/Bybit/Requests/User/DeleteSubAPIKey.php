<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/rm-sub-apikey
 */
class DeleteSubAPIKey extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public ?string $apikey = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/delete-sub-api';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'apikey' => Conditional::ifNotEmpty($this->apikey),
        ]);
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
