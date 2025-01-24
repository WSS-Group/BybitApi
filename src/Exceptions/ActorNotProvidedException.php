<?php

namespace BybitApi\Exceptions;

use Error;

class ActorNotProvidedException extends Error
{
    public function __construct()
    {
        parent::__construct('Actor not provided', 500);
    }
}