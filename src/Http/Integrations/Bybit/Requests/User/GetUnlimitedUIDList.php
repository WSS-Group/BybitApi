<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\CursorCollection;
use BybitApi\DTOs\User\UID;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/page-subuid
 */
class GetUnlimitedUIDList extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public ?int $pageSize = null,
        public ?string $nextCursor = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/submembers';
    }

    protected function defaultQuery(): array
    {
        return Conditional::array([
            'pageSize' => Conditional::ifNotNull($this->pageSize),
            'nextCursor' => Conditional::ifNotNull($this->nextCursor),
        ]);
    }

    public function createDtoFromResponse(Response $response): CursorCollection
    {
        return CursorCollection::init(
            $response->json('result.subMembers'),
            UID::class,
            $response->json('result.nextCursor')
        );
    }
}
