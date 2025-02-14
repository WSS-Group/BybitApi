<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\Account;

use BybitApi\DTOs\Account\UpgradeResult;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Arr;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/account/upgrade-unified-account
 */
class UpgradeToUnifiedAccount extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/account/upgrade-to-uta';
    }

    protected function defaultBody(): array
    {
        return [
            'upgrade' => true,
        ];
    }

    public function createDtoFromResponse(Response $response): UpgradeResult
    {
        $result = $response->json('result');
        $result['unifiedUpdateMsg'] = Arr::get($result, 'unifiedUpdateMsg.msg', []);

        return UpgradeResult::init($result);
    }
}
