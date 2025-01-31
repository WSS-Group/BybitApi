<?php

use BybitApi\Exceptions\InvalidCacheTTLException;
use BybitApi\Facades\Market as MarketFacade;
use BybitApi\Groups\Group;
use BybitApi\Groups\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use BybitApi\Http\Integrations\NullCacheDriver;
use BybitApi\Tests\Fixtures\Bybit\Market\GetBybitServerTime\OkFixture;
use Saloon\CachePlugin\Data\CachedResponse;
use Saloon\Data\RecordedResponse;
use Saloon\Http\Faking\MockClient;

it('can set cache on group', function () {
    $market = new Market;
    $reflection = new ReflectionClass(Group::class);
    $cacheTTL = $reflection->getProperty('cacheTTL');

    expect($cacheTTL->getValue($market))
        ->toBeFalse()
        ->and($market->withCache(10))
        ->toBeInstanceOf(Market::class)
        ->and($cacheTTL->getValue($market))
        ->toEqual(10)
        ->and(fn () => $market->withCache(-10))
        ->toThrow(InvalidCacheTTLException::class)
        ->and($market->withoutCache())
        ->toBeInstanceOf(Market::class)
        ->and($cacheTTL->getValue($market))
        ->toBeFalse();
});

it('can cache', function () {
    MockClient::global([
        GetBybitServerTime::class => OkFixture::call(),
    ]);
    $connector = MarketFacade::actingAs($this->defaultActor())->withCache(10)->connector();
    $result = $connector->send(new GetBybitServerTime);
    expect($result->isCached())
        ->toBeFalse();
    $result = $connector->send(new GetBybitServerTime);
    expect($result->isCached())
        ->toBeTrue();
});

it('don\'t cache', function () {
    MockClient::global([
        GetBybitServerTime::class => OkFixture::call(),
    ]);
    $connector = MarketFacade::actingAs($this->defaultActor())->withoutCache()->connector();
    $result = $connector->send(new GetBybitServerTime);
    expect($result->isCached())
        ->toBeFalse();
    $result = $connector->send(new GetBybitServerTime);
    expect($result->isCached())
        ->toBeFalse();
});

it('test null cache driver', function () {
    $driver = new NullCacheDriver;

    $cachedResponse = new CachedResponse(
        new RecordedResponse(200, [], 'foo'),
        today()->addDay()->toDateTimeImmutable(),
        200,
    );

    expect($driver->get('foo_bar'))
        ->toBeNull()
        ->and($driver->delete('foo_bar'))
        ->toBeNull()
        ->and($driver->set('foo_bar', $cachedResponse))
        ->toBeNull();
});
