<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/froze-subuid
 */
class FreezeSubUID extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $subuid,
        public bool $frozen,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/frozen-sub-member';
    }

    protected function defaultBody(): array
    {
        return [
            'subuid' => $this->subuid,
            'frozen' => $this->frozen ? 1 : 0,
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
