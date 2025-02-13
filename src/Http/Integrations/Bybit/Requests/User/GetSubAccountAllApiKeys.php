<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\User\SubApiKey;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/list-sub-apikeys
 */
class GetSubAccountAllApiKeys extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public string $subMemberId,
        public ?int $limit = null,
        public ?string $cursor = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/sub-apikeys';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'subMemberId' => $this->subMemberId,
            'limit' => Conditional::ifNotNull($this->limit),
            'cursor' => Conditional::ifNotEmpty($this->cursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.result'),
            SubApiKey::class,
            $response->json('result.nextPageCursor')
        );
    }
}
