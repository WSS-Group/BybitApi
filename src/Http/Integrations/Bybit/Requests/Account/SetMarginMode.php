<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\DTOs\Account\MarginModeReason;
use BybitApi\Enums\MarginMode;
use BybitApi\Http\Integrations\Bybit\Requests\BypassCodes;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/set-margin-mode
 */
class SetMarginMode extends Request implements BypassCodes, HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public MarginMode $marginMode,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/set-margin-mode';
    }

    protected function defaultBody(): array
    {
        return [
            'setMarginMode' => $this->marginMode,
        ];
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.reasons', []))
            ->map(fn (array $data) => MarginModeReason::init($data));
    }

    public function bypassCodes(): array
    {
        return [3400045];
    }
}
