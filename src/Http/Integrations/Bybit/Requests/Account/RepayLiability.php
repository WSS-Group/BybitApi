<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Account\Repayment;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/repay-liability
 */
class RepayLiability extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public null|BackedEnum|string $coin = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/quick-repayment';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'repay' => Conditional::ifNotNull($this->coin ? null : true),
            'coin' => Conditional::ifNotEmpty($this->coin),
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('result.list'))
            ->map(fn (array $data) => Repayment::init($data));
    }
}
