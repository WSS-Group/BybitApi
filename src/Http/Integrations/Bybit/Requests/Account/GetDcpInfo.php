<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\DTOs\Account\DcpInfo;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/dcp-info
 */
class GetDcpInfo extends Request
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
        return '/v5/account/query-dcp-info';
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.dcpInfos'))
            ->mapWithKeys(fn (array $data) => [Arr::get($data, 'product') => DcpInfo::init($data)]);
    }
}
