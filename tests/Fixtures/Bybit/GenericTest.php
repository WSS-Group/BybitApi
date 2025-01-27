<?php

use BybitApi\Exceptions\ActorNotProvidedException;
use BybitApi\Facades\Market;

it('fail on actor not informed', function () {
    expect(fn () => Market::getBybitServerTime())
        ->toThrow(ActorNotProvidedException::class);
});
