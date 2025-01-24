<?php

namespace BybitApi\Facades;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use Illuminate\Support\Facades\Facade;

/**
 * @method self actingAs(BybitActor|ActorSupplier $entity)
 *
 * @see \BybitApi\Groups\Market
 */
class Market extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Market::class;
    }
}
