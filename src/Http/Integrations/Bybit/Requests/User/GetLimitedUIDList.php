<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\DTOs\User\UID;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/subuid-list
 */
class GetLimitedUIDList extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/query-sub-members';
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.subMembers'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'uid') => UID::init($data)]);
    }
}
