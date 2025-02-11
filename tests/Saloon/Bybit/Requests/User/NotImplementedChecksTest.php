<?php

use BybitApi\Exceptions\NotImplementedYetException;
use BybitApi\Facades\User;

it('check if all not implemented tests throw exception', function () {
    $user = User::actingAs($this->defaultActor());
    $commonError = "Endpoint not implemented yet on 'BybitApi\Groups\User::";

    expect(fn () => $user->createSubUid())
        ->toThrow(NotImplementedYetException::class, "{$commonError}createSubUid'.")
        ->and(fn () => $user->createSubUidApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}createSubUidApiKey'.")
        ->and(fn () => $user->getLimitedSubUidList())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getLimitedSubUidList'.")
        ->and(fn () => $user->getPaginatedSubUidList())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getPaginatedSubUidList'.")
        ->and(fn () => $user->freezeSubUid())
        ->toThrow(NotImplementedYetException::class, "{$commonError}freezeSubUid'.")
        ->and(fn () => $user->getApiKeyInformation())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getApiKeyInformation'.")
        ->and(fn () => $user->getSubAccountAllApiKeys())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getSubAccountAllApiKeys'.")
        ->and(fn () => $user->getUidWalletType())
        ->toThrow(NotImplementedYetException::class, "{$commonError}getUidWalletType'.")
        ->and(fn () => $user->modifyMasterApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}modifyMasterApiKey'.")
        ->and(fn () => $user->modifySubApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}modifySubApiKey'.")
        ->and(fn () => $user->deleteSubUid())
        ->toThrow(NotImplementedYetException::class, "{$commonError}deleteSubUid'.")
        ->and(fn () => $user->deleteMasterApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}deleteMasterApiKey'.")
        ->and(fn () => $user->deleteSubApiKey())
        ->toThrow(NotImplementedYetException::class, "{$commonError}deleteSubApiKey'.");
});
