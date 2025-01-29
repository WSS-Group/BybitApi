<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\SymbolStatus;

it('test interval labels', function (Interval $interval) {
    expect($interval->label())
        ->toBeString();
})->with(Interval::cases());

it('test category labels', function (Category $category) {
    expect($category->label())
        ->toBeString();
})->with(Category::cases());

it('test symbols status labels', function (SymbolStatus $category) {
    expect($category->label())
        ->toBeString();
})->with(SymbolStatus::cases());
