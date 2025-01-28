<?php

namespace BybitApi\Exceptions;

use Error;

class InvalidCacheTTLException extends Error
{
    public function __construct()
    {
        parent::__construct('Cache TTL must be greater than 0', 500);
    }
}
