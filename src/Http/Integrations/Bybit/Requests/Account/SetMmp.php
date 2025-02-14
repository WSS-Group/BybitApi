<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/set-mmp
 */
class SetMmp extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public BackedEnum|string $baseCoin,
        public int $window,
        public int $frozenPeriod,
        public float $qtyLimit,
        public float $deltaLimit,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/mmp-modify';
    }

    protected function defaultBody(): array
    {
        return [
            'baseCoin' => $this->baseCoin,
            'window' => $this->window,
            'frozenPeriod' => $this->frozenPeriod,
            'qtyLimit' => $this->qtyLimit,
            'deltaLimit' => $this->deltaLimit,
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
