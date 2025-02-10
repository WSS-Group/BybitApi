<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\OrderStatus;
use BybitApi\Enums\OrderType;
use BybitApi\Enums\Product;
use BybitApi\Enums\Side;
use BybitApi\Enums\StopOrderType;
use BybitApi\Enums\SymbolStatus;
use BybitApi\Enums\TransferStatus;
use BybitApi\Enums\WithdrawStatus;

it('test interval labels', function (Interval $interval) {
    expect($interval->label())
        ->toBeString();
})->with(Interval::cases());

it('test category labels', function (Category $category) {
    expect($category->label())
        ->toBeString();
})->with(Category::cases());

it('test order side labels', function (Side $side) {
    expect($side->label())
        ->toBeString();
})->with(Side::cases());

it('test order status labels and other methods', function (OrderStatus $side) {
    expect($side->label())
        ->toBeString()
        ->and($side->isOpen())
        ->toBe(in_array($side, [OrderStatus::NEW, OrderStatus::UNTRIGGERED, OrderStatus::PARTIALLY_FILLED]))
        ->and($side->isClosed())
        ->toBe(! in_array($side, [OrderStatus::NEW, OrderStatus::UNTRIGGERED, OrderStatus::PARTIALLY_FILLED]));
})->with(OrderStatus::cases());

it('test order type labels', function (OrderType $type) {
    expect($type->label())
        ->toBeString();
})->with(OrderType::cases());

it('test product labels', function (Product $type) {
    expect($type->label())
        ->toBeString();
})->with(Product::cases());

it('test stop order types labels', function (StopOrderType $type) {
    expect($type->label())
        ->toBeString();
})->with(StopOrderType::cases());

it('test symbols status labels', function (SymbolStatus $status) {
    expect($status->label())
        ->toBeString();
})->with(SymbolStatus::cases());

it('test transfer statuses labels', function (TransferStatus $status) {
    expect($status->label())
        ->toBeString();
})->with(TransferStatus::cases());

it('test withdraw statuses labels', function (WithdrawStatus $status) {
    expect($status->label())
        ->toBeString();
})->with(WithdrawStatus::cases());
