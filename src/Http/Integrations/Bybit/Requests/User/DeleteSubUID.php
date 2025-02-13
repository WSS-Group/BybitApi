<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/rm-subuid
 */
class DeleteSubUID extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public string $subuid,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/del-submember';
    }

    protected function defaultBody(): array
    {
        return [
            'subMemberId' => $this->subuid,
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
