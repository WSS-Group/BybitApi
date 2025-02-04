<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Trade;

use BybitApi\Conditional;
use BybitApi\Enums\Product;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/order/dcp
 */
class SetDisconnectCancelAll extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public int $timeWindow,
        public ?Product $product = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/order/disconnected-cancel-all';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'timeWindow' => $this->timeWindow,
            'product' => Conditional::ifNotEmpty($this->product),
        ]);
    }

    public function createDtoFromResponse(Response $response): bool
    {
        return $response->json('retCode') === 0;
    }
}
