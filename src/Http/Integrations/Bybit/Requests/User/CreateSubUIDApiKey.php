<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\DTOs\User\CreatedSubApiKey;
use BybitApi\Http\Integrations\Bybit\Entities\Users\SubPermissions;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid-apikey
 */
class CreateSubUIDApiKey extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public ?string $ipsString {
        get => ($this->ips === null ? null : implode(',', $this->ips));
    }

    public function __construct(
        public int $subuid,
        public bool $readOnly,
        public SubPermissions $permissions,
        public ?string $note = null,
        public ?array $ips = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/create-sub-api';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'subuid' => $this->subuid,
            'readOnly' => $this->readOnly ? 1 : 0,
            'note' => Conditional::ifNotEmpty($this->note),
            'ips' => Conditional::ifNotEmpty($this->ipsString),
            'permissions' => $this->permissions->toArray(),
        ]);
    }

    public function createDtoFromResponse(Response $response): CreatedSubApiKey
    {
        return CreatedSubApiKey::init($response->json('result'));
    }
}
