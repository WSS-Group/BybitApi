<?php

namespace BybitApi\Facades;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\Http\Integrations\Bybit\BybitConnector;
use Illuminate\Support\Facades\Facade;

/**
 * @method $this actingAs(BybitActor|ActorSupplier $entity)
 * @method BybitConnector connector()
 * @method $this withCache(int $ttl)
 * @method $this withoutCache()
 *
 * @see \BybitApi\Groups\Market
 */
abstract class Group extends Facade
{
    //
}
