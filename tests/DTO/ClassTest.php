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
        'inspiration' => [
            'model' => 'ford T',
            'brand_name' => 'Ford',
            'year' => '1923',
            'cost' => '5432.21',
            'category' => 'inverse',
            'boughtAt' => '1738108800000',
            'inspiration' => null,
            'children' => null,
        ],
        'children' => [
            [
                'model' => 'fusca',
                'brand_name' => 'VW',
                'year' => '1979',
                'cost' => '21432.21',
                'category' => 'inverse',
                'boughtAt' => '1738108800000',
                'inspiration' => null,
                'children' => null,
            ],
            [
                'model' => 'fusca',
                'brand_name' => 'VW',
                'year' => '1979',
                'cost' => '21432.21',
                'category' => 'inverse',
                'boughtAt' => '1738108800000',
                'inspiration' => null,
                'children' => null,
            ],
        ],
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
        ->toBeInstanceOf(Carbon::class)
        ->and($car->inspiration)
        ->toBeInstanceOf(Car::class)
        ->and($car->children)
        ->toBeArray()
        ->each
        ->toBeInstanceOf(Car::class)
        ->and($car->raw())
        ->toBeArray()
        ->toHaveKeys(['model', 'brand_name', 'year', 'cost', 'category', 'boughtAt'])
        ->not
        ->toHaveKey('brand')
        ->and($car->toArray())
        ->toBeArray()
        ->toHaveKeys(['model', 'brand', 'year', 'cost', 'category', 'boughtAt'])
        ->not
        ->toHaveKey('brand_name')
        ->and($car->toArray()['boughtAt'])
        ->toBeInstanceOf(Carbon::class);
});
