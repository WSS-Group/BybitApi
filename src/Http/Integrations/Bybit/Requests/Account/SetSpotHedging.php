<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/set-spot-hedge
 */
class SetSpotHedging extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public bool $hedgeMode,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/set-hedging-mode';
    }

    protected function defaultBody(): array
    {
        return [
            'setHedgingMode' => $this->hedgeMode ? 'ON' : 'OFF',
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
