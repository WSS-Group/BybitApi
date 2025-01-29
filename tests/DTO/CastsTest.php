<?php

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\DTOArrayCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\Enums\Category;
use BybitApi\Tests\DTO\Car;

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

it('cast dto array', function () {
    $cast = new DTOArrayCast(Car::class);

    $casted = $cast([
        [
            'model' => 'fusca',
            'brand_name' => 'VW',
            'year' => '1979',
            'cost' => '21432.21',
            'category' => 'inverse',
            'boughtAt' => '1738108800000',
        ],
        [
            'model' => 'gol',
            'brand_name' => 'VW',
            'year' => '203',
            'cost' => '43432.21',
            'category' => 'spot',
            'boughtAt' => '1738108800000',
        ],
    ]);

    expect($casted)
        ->toBeArray()
        ->toHaveCount(2)
        ->each
        ->toBeInstanceOf(Car::class)
        ->and($cast('dsa'))
        ->toBeNull();
});

it('cast boolean', function () {
    $cast = new BooleanCast();

    expect($cast('1'))
        ->toBeTrue()
        ->and($cast('foo'))
        ->toBeFalse()
        ->and($cast('true'))
        ->toBeTrue()
        ->and($cast(true))
        ->toBeTrue()
        ->and($cast('foo'))
        ->toBeFalse()
        ->and($cast('0'))
        ->toBeFalse()
        ->and($cast('false'))
        ->toBeFalse()
        ->and($cast(false))
        ->toBeFalse()
        ->and($cast(''))
        ->toBeNull()
        ->and($cast(null))
        ->toBeNull();
});

it('cast float', function () {
    $cast = new FloatCast;

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
    $cast = new IntCast;

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
    $cast = new StringCast;

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
    $cast = new TimestampCast;

    expect($cast(today()->getTimestampMs()))
        ->toEqual(today())
        ->and($cast(''))
        ->toBeNull()
        ->and($cast(null))
        ->toBeNull();
});
