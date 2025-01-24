<?php

namespace BybitApi\Exceptions;

use Error;

class NotImplementedYetException extends Error
{
    public function __construct()
    {
        $call = $this->getTrace()[0];
        $class = $call['class'] ?? null;
        $method = $call['function'] ?? null;
        parent::__construct(
            sprintf(
                'Endpoint not implemented yet%s.',
                !empty($method) ? " on '$class::$method'" : '',
            ),
            500
        );
    }
}