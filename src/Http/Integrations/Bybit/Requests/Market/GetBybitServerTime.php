<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Market;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Carbon;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/market/time
 */
class GetBybitServerTime extends Request
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
        return '/v5/market/time';
    }

    public function createDtoFromResponse(Response $response): Carbon
    {
        $miliSeconds = intval($response->json('result.timeNano')) / 1_000_000;

        return Carbon::createFromTimestampMs($miliSeconds)
            ->setTimezone(config('app.timezone'));
    }
}
