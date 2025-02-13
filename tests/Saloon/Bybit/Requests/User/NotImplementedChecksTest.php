<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\User;

it('check if all not implemented tests throw exception', function () {
    $user = User::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\User::";

    expect(fn () => $user->modifySubApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}modifySubApiKey'.")
        ->and(fn () => $user->deleteMasterApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}deleteMasterApiKey'.")
        ->and(fn () => $user->deleteSubApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}deleteSubApiKey'.");
});
