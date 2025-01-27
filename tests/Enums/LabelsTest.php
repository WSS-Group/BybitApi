<?php

use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;

it('test interval labels', function (Interval $interval) {
    expect($interval->label())
        ->toBeString();
})->with(Interval::cases());

it('test category labels', function (Category $category) {
    expect($category->label())
        ->toBeString();
})->with(Category::cases());
