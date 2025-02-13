<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\DTOs\User\ChangedApiKey;
use BybitApi\Http\Integrations\Bybit\Entities\Users\Permissions;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/modify-sub-apikey
 */
class ModifySubApiKey extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public ?string $readOnlyInt {
        get => ($this->readOnly === null ? null : ($this->readOnly ? 1 : 0));
    }

    public ?string $ipsString {
        get => ($this->ips === null ? null : implode(',', $this->ips));
    }

    public function __construct(
        public ?string $apikey = null,
        public ?bool $readOnly = null,
        public ?Permissions $permissions = null,
        public ?array $ips = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/update-sub-api';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'apikey' => Conditional::ifNotEmpty($this->apikey),
            'readOnly' => Conditional::ifNotNull($this->readOnlyInt),
            'permissions' => Conditional::ifNotNull($this->permissions?->toArray()),
            'ips' => Conditional::ifNotNull($this->ipsString),
        ]);
    }

    public function createDtoFromResponse(Response $response): ChangedApiKey
    {
        return ChangedApiKey::init($response->json('result'));
    }
}
