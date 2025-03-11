<?php

namespace BybitApi\Exceptions;

use Error;
use Saloon\Http\Response;

class UnexpectedResultOnResponseException extends Error
{
    public function __construct(
        public Response $response,
        public readonly int $retCode,
        public readonly string $retMsg,
    ) {
        parent::__construct(
            sprintf('Unexpected result on response. Code: %s; Message: %s', $this->retCode, $this->retMsg),
            500
        );
    }

    /**
     * Get the exception's context information.
     *
     * @return array<string, mixed>
     *
     * @throws \JsonException
     */
    public function context(): array
    {
        return rescue(fn () => $this->response->json(), [], false);
    }
}
