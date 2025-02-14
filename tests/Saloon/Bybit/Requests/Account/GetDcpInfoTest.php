<?php

use BybitApi\DTOs\Account\DcpInfo;
use BybitApi\Enums\Product;
use BybitApi\Facades\Account;
use BybitApi\Http\Integrations\Bybit\Requests\Account\GetDcpInfo;
use BybitApi\Tests\Fixtures\Bybit\Account\GetDcpInfo\OkFixture;
use Illuminate\Support\Collection;
use Pest\Expectation;
use Saloon\Http\Faking\MockClient;

it('can get dcp info for products', function () {
    MockClient::global([
        GetDcpInfo::class => OkFixture::call(),
    ]);

    $result = Account::actingAs($this->defaultActor())->getDcpInfo();

    expect($result)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
        ->each(function (Expectation $e) {
            /** @var \BybitApi\DTOs\Account\DcpInfo $value */
            $value = $e->value;
            expect($value)
                ->toBeInstanceOf(DcpInfo::class)
                ->and($value->product)
                ->toBeInstanceOf(Product::class)
                ->and($value->dcpStatus)
                ->toBeString()
                ->and($value->timeWindow)
                ->toBeInt();
        });
});
