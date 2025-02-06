<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Position;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Position\AddOrReduceMarginInfo;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionIndex;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/position/manual-add-margin
 */
class AddOrReduceMargin extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public Category $category,
        public BackedEnum|string $symbol,
        public string $margin,
        public ?PositionIndex $positionIdx = null,
    ) {
        //
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/position/add-margin';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'category' => $this->category,
            'symbol' => $this->symbol,
            'margin' => $this->margin,
            'positionIdx' => Conditional::ifNotNull($this->positionIdx),
        ]);
    }

    public function createDtoFromResponse(Response $response): AddOrReduceMarginInfo
    {
        return AddOrReduceMarginInfo::init($response->json('result'));
    }
}
