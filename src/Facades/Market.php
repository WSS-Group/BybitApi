<?php

namespace BybitApi\Facades;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Facade;

/**
 * @method self actingAs(BybitActor|ActorSupplier $entity)
 * @method Carbon getBybitServerTime()
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
