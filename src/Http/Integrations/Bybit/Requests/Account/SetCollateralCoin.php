<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Enums\CollateralSwitch;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/set-collateral
 */
class SetCollateralCoin extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public BackedEnum|string $coin,
        public CollateralSwitch $switch,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/set-collateral-switch';
    }

    protected function defaultBody(): array
    {
        return [
            'coin' => $this->coin,
            'collateralSwitch' => $this->switch,
        ];
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
