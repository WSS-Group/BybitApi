<?php

namespace BybitApi\Http\Integrations\Bybit\Requests\User;

use BybitApi\Conditional;
use BybitApi\DTOs\User\UID;
use BybitApi\Enums\MemberType;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;

/**
 * @link https://bybit-exchange.github.io/docs/v5/user/create-subuid
 */
class CreateSubUID extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::POST;

    public ?int $switchInt {
        get => ($this->switch === null ? null : (int) $this->switch);
    }

    public function __construct(
        public string $username,
        public MemberType $memberType,
        public ?string $password = null,
        public ?bool $switch = null,
        public ?string $note = null,
    ) {}

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/v5/user/create-sub-member';
    }

    protected function defaultBody(): array
    {
        return Conditional::array([
            'username' => $this->username,
            'memberType' => $this->memberType,
            'password' => Conditional::ifNotEmpty($this->password),
            'switch' => Conditional::ifNotNull($this->switchInt),
            'note' => Conditional::ifNotEmpty($this->note),
        ]);
    }

    public function createDtoFromResponse(Response $response): UID
    {
        return UID::init($response->json('result'));
    }
}
