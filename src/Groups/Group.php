<?php

namespace BybitApi\Groups;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\Exceptions\ActorNotProvidedException;
use BybitApi\Http\Integrations\Bybit\BybitConnector;

abstract class Group
{
    protected BybitActor $bybitParams;

    public function connector(): BybitConnector
    {
        throw_if(empty($this->bybitParams), ActorNotProvidedException::class);

        return new BybitConnector($this->bybitParams);
    }

    public function actingAs(BybitActor|ActorSupplier $entity): self
    {
        $this->bybitParams = $entity instanceof BybitActor ? $entity : $entity->actingAs();

        return $this;
    }
}
