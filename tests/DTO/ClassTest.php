<?php

use BybitApi\Enums\Category;
use BybitApi\Tests\DTO\Car;
use Illuminate\Support\Carbon;

it('check all possibilities from class', function () {
    $car = Car::init([
        'model' => 'fusca',
        'brand_name' => 'VW',
        'year' => '1979',
        'cost' => '21432.21',
        'category' => 'inverse',
        'boughtAt' => '1738108800000',
    ]);

    expect($car)
        ->toBeInstanceOf(Car::class)
        ->and($car->model)
        ->toBe('fusca')
        ->and($car->brand)
        ->toBe('VW')
        ->and(fn () => $car->brand_name)
        ->toThrow('Undefined property: BybitApi\Tests\DTO\Car::$brand_name')
        ->and($car->year)
        ->toBe(1979)
        ->and($car->cost)
        ->toBe(21_432.21)
        ->and($car->category)
        ->toBe(Category::INVERSE)
        ->and($car->boughtAt)
        ->toBeInstanceOf(Carbon::class);
});
