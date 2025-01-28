<?php

namespace BybitApi\Http\Integrations\Bybit\Requests;

use BybitApi\Http\Integrations\NullCacheDriver;
use Illuminate\Support\Facades\Cache;
use Saloon\CachePlugin\Contracts\Cacheable;
use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Drivers\PsrCacheDriver;
use Saloon\CachePlugin\Traits\HasCaching;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;
use Saloon\Traits\Body\HasJsonBody;
use Saloon\Traits\Body\HasMultipartBody;
use Saloon\Traits\Body\HasStringBody;
use Saloon\Traits\Body\HasXmlBody;

abstract class CacheableRequest extends Request implements Cacheable
{
    use HasCaching;

    protected int|false $cacheTTL = false;

    /**
     * Resolve the driver responsible for caching
     */
    public function resolveCacheDriver(): Driver
    {
        return $this->cacheTTL !== false
            ? new PsrCacheDriver(Cache::driver())
            : new NullCacheDriver;
    }

    /**
     * Define the cache expiry in seconds
     */
    public function cacheExpiryInSeconds(): int
    {
        return $this->cacheTTL;
    }

    protected function cacheKey(PendingRequest $pendingRequest): ?string
    {
        $endpoint = $this->resolveEndpoint();
        $query = json_encode($this->defaultQuery());
        $uses = class_uses($this);
        $body = match (true) {
            in_array(HasJsonBody::class, $uses) => json_encode($this->defaultBody()),
            in_array(HasMultipartBody::class, $uses) => json_encode($this->defaultBody()),
            in_array(HasFormBody::class, $uses) => json_encode($this->defaultBody()),
            in_array(HasXmlBody::class, $uses) => $this->defaultBody(),
            in_array(HasStringBody::class, $uses) => $this->defaultBody(),
            default => '',
        };
        $md5 = md5("$endpoint::$query::$body");

        return static::class.'::'.$md5;
    }

    public function setCache(false|int $ttl): self
    {
        $this->cacheTTL = $ttl;

        return $this;
    }
}
