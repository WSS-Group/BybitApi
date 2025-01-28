<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\DTOs\Kline;
use BybitApi\DTOs\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Http\Integrations\Bybit\BybitConnector;
use Carbon\Carbon;
use Illuminate\Support\Collection;
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
