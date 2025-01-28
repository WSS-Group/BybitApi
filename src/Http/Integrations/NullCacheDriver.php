<?php

namespace BybitApi\Http\Integrations;

use Saloon\CachePlugin\Contracts\Driver;
use Saloon\CachePlugin\Data\CachedResponse;

class NullCacheDriver implements Driver
{

    public function set(string $key, CachedResponse $cachedResponse): void
    {
        // Do nothing
    }

    public function get(string $cacheKey): ?CachedResponse
    {
        return null;
    }

    public function delete(string $cacheKey): void
    {
        // Do nothing
    }
}