<?php

namespace BybitApi\Http\Integrations\Bybit\Auth;

use BybitApi\Http\Integrations\Bybit\BybitConnector;
use Saloon\Contracts\Authenticator;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;

class SignedAuthenticator implements Authenticator
{
    /**
     * Apply the authentication to the request.
     */
    public function set(PendingRequest $pendingRequest): void
    {
        /** @var \BybitApi\Http\Integrations\Bybit\BybitConnector $connector */
        $connector = $pendingRequest->getConnector();
        $timestamp = time() * 1000;
        $signature = $this->generateSignature($pendingRequest, $connector, $timestamp);

        $pendingRequest->headers()->add('X-BAPI-API-KEY', $connector->bybitParams->apiKey);
        $pendingRequest->headers()->add('X-BAPI-TIMESTAMP', $timestamp);
        $pendingRequest->headers()->add('X-BAPI-RECV-WINDOW', $connector->bybitParams->recvWindow);
        $pendingRequest->headers()->add('X-BAPI-SIGN', $signature);
        if (! empty($connector->bybitParams->referer)) {
            $pendingRequest->headers()->add('X-Referer', $connector->bybitParams->referer);
        }
    }

    public function generateSignature(PendingRequest $pendingRequest, BybitConnector $connector, int $timestamp): string
    {
        if ($pendingRequest->getMethod() === Method::GET) {
            $params = implode('&', array_map(
                fn ($key, $value) => $key.'='.urlencode($value),
                array_keys($pendingRequest->query()->all()),
                array_values($pendingRequest->query()->all())
            ));
        } else {
            $params = json_encode($pendingRequest->body()->all());
        }
        $signature = str($timestamp)
            ->append($connector->bybitParams->apiKey)
            ->append($connector->bybitParams->recvWindow)
            ->append($params)
            ->toString();

        return hash_hmac('sha256', $signature, $connector->bybitParams->secretKey);
    }
}
