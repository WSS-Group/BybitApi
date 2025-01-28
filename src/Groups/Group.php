<?php

namespace BybitApi\Groups;

use BybitApi\ActorSupplier;
use BybitApi\BybitActor;
use BybitApi\Exceptions\ActorNotProvidedException;
use BybitApi\Exceptions\InvalidCacheTTLException;
use BybitApi\Http\Integrations\Bybit\BybitConnector;

abstract class Group
{

    private false|int $cacheTTL = false;

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

    protected function cacheTTL(): int|false
    {
        $ttl = $this->cacheTTL;
        $this->withoutCache();
        return $ttl;
    }

    public function withCache(int $ttl): self
    {
        throw_if($ttl <= 0, InvalidCacheTTLException::class);
        $this->cacheTTL = $ttl;
        return $this;
    }

    public function withoutCache(): self
    {
        $this->cacheTTL = false;
        return $this;
    }
}
