<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\DTOs\Asset\WithdrawableAmount;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/balance/delay-amount
 */
class GetWithdrawableAmount extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    public function __construct(
        public BackedEnum|string $coin,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/withdraw/withdrawable-amount';
    }

    protected function defaultQuery(): array
    {
        return [
            'coin' => $this->coin,
        ];
    }

    public function createDtoFromResponse(Response $response): WithdrawableAmount
    {
        return WithdrawableAmount::init($response->json('result'));
    }
}
