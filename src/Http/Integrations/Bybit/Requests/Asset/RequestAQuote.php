<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Asset;

use BackedEnum;
use BybitApi\Conditional;
use BybitApi\DTOs\Asset\ConvertQuote;
use BybitApi\Enums\CoinType;
use BybitApi\Enums\ConvertAccountType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/asset/convert/apply-quote
 */
class RequestAQuote extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public function __construct(
        public ConvertAccountType $accountType,
        public BackedEnum|string $fromCoin,
        public BackedEnum|string $toCoin,
        public BackedEnum|string $requestCoin,
        public string $requestAmount,
        public ?CoinType $fromCoinType = null,
        public ?CoinType $toCoinType = null,
        public ?string $paramType = null,
        public ?string $paramValue = null,
        public ?string $requestId = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/asset/exchange/quote-apply';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'accountType' => $this->accountType,
            'fromCoin' => $this->fromCoin,
            'toCoin' => $this->toCoin,
            'requestCoin' => $this->requestCoin,
            'requestAmount' => $this->requestAmount,
            'fromCoinType' => Conditional::ifNotNull($this->fromCoinType),
            'toCoinType' => Conditional::ifNotNull($this->toCoinType),
            'paramType' => Conditional::ifNotNull($this->paramType),
            'paramValue' => Conditional::ifNotNull($this->paramValue),
            'requestId' => Conditional::ifNotNull($this->requestId),
        ]);
    }

    public function createDtoFromResponse(Response $response): ConvertQuote
    {
        return ConvertQuote::init($response->json('result'));
    }
}
