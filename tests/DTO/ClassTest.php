<?php

use BybitApi\Enums\Category;
use BybitApi\Tests\DTO\Car;
use BybitApi\Tests\DTO\Parameter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

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
    'parameters' => [
        'color' => [
            'label' => 'Color',
            'value' => 'red',
        ],
        'brand' => [
            'label' => 'Brand',
            'value' => 'VW',
        ],
    ],
]);

it('check basic properties', function () use ($car) {
    expect($car)
        ->toBeInstanceOf(Car::class)
        ->and($car->model)
        ->toBe('fusca')
        ->and($car->year)
        ->toBe(1979)
        ->and($car->cost)
        ->toBe(21_432.21)
        ->and($car->category)
        ->toBe(Category::INVERSE)
        ->and($car->boughtAt)
        ->toBeInstanceOf(Carbon::class);
});

it('check that alias works', function () use ($car) {
    expect($car)
        ->toBeInstanceOf(Car::class)
        ->and(fn () => $car->brand_name)
        ->toThrow('Undefined property: BybitApi\Tests\DTO\Car::$brand_name')
        ->and($car->brand)
        ->toBe('VW');
});

it('check if single child is a dto too', function () use ($car) {

    expect($car->inspiration)
        ->toBeInstanceOf(Car::class)
        ->and($car->inspiration->model)
        ->toBe('ford T');
});

it('check collection dto', function () use ($car) {
    expect($car->children)
        ->toBeInstanceOf(Collection::class)
        ->toHaveCount(2)
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

it('check array dto', function () use ($car) {
    expect($car->parameters)
        ->toBeArray()
        ->toHaveCount(2);

    foreach ($car->parameters as $key => $parameter) {
        expect($parameter)
            ->toBeInstanceOf(Parameter::class)
            ->and($parameter->label)
            ->toBeString()
            ->and(in_array($key, ['color', 'brand']))->toBeTrue();
    }
});

it('test to array', function () use ($car) {
    $carArray = $car->toArray();
    expect($carArray)
        ->toBeArray()
        ->toHaveKeys(['model', 'year', 'cost', 'category', 'boughtAt', 'parameters', 'children', 'inspiration'])
        ->and($carArray['parameters'])
        ->toBeArray()
        ->each
        ->toBeArray()
        ->not
        ->toBeEmpty()
        ->and($carArray['children'])
        ->toBeArray()
        ->each
        ->toBeArray()
        ->not
        ->toBeEmpty();
});

it('can create a macro', function () {
    Car::macro('getModel', function () {
        return $this->model;
    });

    $car = Car::init([
        'model' => 'fusca',
        'brand_name' => 'VW',
        'year' => '1979',
        'cost' => '21432.21',
        'category' => 'inverse',
        'boughtAt' => '1738108800000',
    ]);

    expect(Car::hasMacro('getModel'))
        ->toBeTrue()
        ->and($car->getModel())
        ->toBe('fusca');
});
