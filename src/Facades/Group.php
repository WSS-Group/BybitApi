<?php

namespace BybitApi\Facades;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\Http\Integrations\Bybit\BybitConnector;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use Illuminate\Support\Facades\Facade;
use Saloon\Http\Response;

/**
 * @method $this actingAs(BybitActor|ActorSupplier $entity)
 * @method BybitConnector connector()
 * @method Response send(Request $request)
 * @method $this withCache(int $ttl)
 * @method $this withoutCache()
 *
 * @see \BybitApi\Groups\Market
 */
abstract class Group extends Facade
{
    //
}
