<?php

use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\Enums\Category;

it('cast enum', function () {
    $cast1 = new EnumCast(Category::class, Category::SPOT, Category::INVERSE);
    $cast2 = new EnumCast(Category::class, null);

    expect($cast1('linear'))
        ->toBe(Category::LINEAR)
        ->and($cast1('abc'))
        ->toBe(Category::SPOT)
        ->and($cast1(''))
        ->toBe(Category::INVERSE)
        ->and($cast2('linear'))
        ->toBe(Category::LINEAR)
        ->and($cast2('abc'))
        ->toBeNull()
        ->and($cast2(''))
        ->toBeNull();
});

it('cast float', function () {
    $cast = new FloatCast();

    expect($cast('12.4'))
        ->toBe(12.4)
        ->and($cast(10))
        ->toBe(10.0)
        ->and($cast(''))
        ->toBeNull()
        ->and($cast(null))
        ->toBeNull();
});

it('cast int', function () {
    $cast = new IntCast();

    expect($cast('12'))
        ->toBe(12)
        ->and($cast('11.9'))
        ->toBe(11)
        ->and($cast(10))
        ->toBe(10)
        ->and($cast(''))
        ->toBeNull()
        ->and($cast(null))
        ->toBeNull();
});

it('cast string', function () {
    $cast = new StringCast();

    expect($cast('abc'))
        ->toBe('abc')
        ->and($cast(11))
        ->toBe('11')
        ->and($cast(true))
        ->toBe('1')
        ->and($cast(null))
        ->toBeNull();
});

it('cast timestamp', function () {
    $cast = new TimestampCast();

    expect($cast(today()->getTimestampMs()))
        ->toEqual(today())
        ->and($cast(''))
        ->toBeNull()
        ->and($cast(null))
        ->toBeNull();
});
