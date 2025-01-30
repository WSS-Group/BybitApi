<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\OrderSide;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\SymbolStatus;

it('test interval labels', function (Interval $interval) {
    expect($interval->label())
        ->toBeString();
})->with(Interval::cases());

it('test category labels', function (Category $category) {
    expect($category->label())
        ->toBeString();
})->with(Category::cases());

it('test order side labels', function (OrderSide $side) {
    expect($side->label())
        ->toBeString();
})->with(OrderSide::cases());

it('test order type labels', function (OrderType $type) {
    expect($type->label())
        ->toBeString();
})->with(OrderType::cases());

it('test symbols status labels', function (SymbolStatus $status) {
    expect($status->label())
        ->toBeString();
})->with(SymbolStatus::cases());
