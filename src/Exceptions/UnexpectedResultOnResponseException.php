<?php

namespace BybitApi\Exceptions;

use Error;
use Saloon\Http\Response;

class UnexpectedResultOnResponseException extends Error
{
    public function __construct(
        public Response $response
    ) {
        $code = $response->json('retCode');
        $msg = $response->json('retMsg');
        parent::__construct("Unexpected result on response. Code: $code; Message: $msg", 500);
    }

    /**
     * Get the exception's context information.
     *
     * @return array<string, mixed>
     * @throws \JsonException
     */
    public function context(): array
    {
        return rescue(fn() => $this->response->json(), [], false);
    }
}
