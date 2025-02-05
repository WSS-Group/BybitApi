<?php

namespace BybitApi\Groups;

use BybitApi\ActorSupplier;
use BybitApi\Attributes\AtLeastOneParameterRequired;
use BybitApi\BybitActor;
use BybitApi\Exceptions\ActorNotProvidedException;
use BybitApi\Exceptions\InvalidCacheTTLException;
use BybitApi\Http\Integrations\Bybit\BybitConnector;
use BybitApi\Http\Integrations\Bybit\Requests\Request;
use ReflectionClass;
use Saloon\Http\Response;

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

    /**
     * @throws \Saloon\Exceptions\Request\FatalRequestException
     * @throws \Saloon\Exceptions\Request\RequestException
     */
    public function send(Request $request): Response
    {
        $reflection = new ReflectionClass($request);
        foreach ($reflection->getAttributes() as $attribute) {
            if ($attribute->getName() === AtLeastOneParameterRequired::class) {
                $attribute->newInstance()($request);
            }
        }
        return $this->connector()->send($request->setCache($this->cacheTTL));
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
