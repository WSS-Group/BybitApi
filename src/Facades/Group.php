<?php

namespace BybitApi\Facades;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\Http\Integrations\Bybit\BybitConnector;
use Illuminate\Support\Facades\Facade;

/**
 * @method self actingAs(BybitActor|ActorSupplier $entity)
 * @method BybitConnector connector()
 * @method self withCache(int $ttl)
 * @method self withoutCache()
 *
 * @see \BybitApi\Groups\Market
 */
abstract class Group extends Facade
{
    //
}
