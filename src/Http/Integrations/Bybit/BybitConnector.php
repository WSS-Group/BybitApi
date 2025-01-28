<?php

namespace BybitApi\Http\Integrations\Bybit;

use BybitApi\BybitActor;
use BybitApi\Http\Integrations\Bybit\Auth\SignedAuthenticator;
use BybitApi\Http\Integrations\Bybit\Middleware\CheckResultMiddleware;
use BybitApi\Http\Integrations\Bybit\Plugins\HasFormattedParams;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Connector;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Plugins\AcceptsJson;

class BybitConnector extends Connector
{
    use AcceptsJson;
    use HasFormattedParams;

    public function __construct(
        public BybitActor $bybitParams,
        private false|int $cacheTTL = false,
    ) {
        $this->middleware()->onResponse(new CheckResultMiddleware);
    }

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return $this->bybitParams->test ? 'https://api-testnet.bybit.com' : 'https://api.bybit.com';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }

    protected function defaultAuth(): Authenticator
    {
        return new SignedAuthenticator;
    }

    public function send(Request $request, ?MockClient $mockClient = null, ?callable $handleRetry = null): Response
    {
        return parent::send($request->setCache($this->cacheTTL), $mockClient, $handleRetry);
    }
}
