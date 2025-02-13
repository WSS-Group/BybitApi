<?php

use BybitApi\Exceptions\EndpointNotFoundException;
use BybitApi\Exceptions\UnexpectedResultOnResponseException;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use BybitApi\Tests\Fixtures\Bybit\Market\GetBybitServerTime\ErrorFixture;
use BybitApi\Tests\Fixtures\Bybit\Market\GetBybitServerTime\NotFoundFixture;
use Saloon\Http\Faking\MockClient;

it('return an exception on not found', function () {
    MockClient::global([
        GetBybitServerTime::class => NotFoundFixture::call(),
    ]);

    expect(fn () => Market::actingAs($this->defaultActor())->getBybitServerTime())
        ->toThrow(EndpointNotFoundException::class, "Endpoint '/v5/market/time' not found");
});

it('return an exception on something went wrong', function () {
    MockClient::global([
        GetBybitServerTime::class => ErrorFixture::call(),
    ]);

    expect(fn () => Market::actingAs($this->defaultActor())->getBybitServerTime())
        ->toThrow(function (UnexpectedResultOnResponseException $e) {
            expect($e->getMessage())
                ->toBe('Unexpected result on response. Code: 1010; Message: Something went wrong')
                ->and($e->context())
                ->toBeArray();
        });
});
