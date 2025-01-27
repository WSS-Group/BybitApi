<?php

use BybitApi\Enums\Category;
use BybitApi\Parser;

it('return enum if not empty', function () {
    $data = [
        'enum1' => '',
        'enum2' => 'foo',
        'enum3' => 'spot',
    ];
    expect(Parser::enumIfNotEmpty($data, 'enum1', Category::class, Category::INVERSE))
        ->toBe(null)
        ->and(Parser::enumIfNotEmpty($data, 'enum2', Category::class, Category::INVERSE))
        ->toBe(Category::INVERSE)
        ->and(Parser::enumIfNotEmpty($data, 'enum3', Category::class, Category::INVERSE))
        ->toBe(Category::SPOT);
});

it('return float if not empty', function () {
    $data = [
        'num1' => '',
        'num2' => null,
        'num3' => '2.4',
        'num4' => 5.2,
    ];
    expect(Parser::floatIfNotEmpty($data, 'num1'))
        ->toBeNull()
        ->and(Parser::floatIfNotEmpty($data, 'num2'))
        ->toBeNull()
        ->and(Parser::floatIfNotEmpty($data, 'num3'))
        ->toBe(2.4)
        ->and(Parser::floatIfNotEmpty($data, 'num4'))
        ->toBe(5.2);
});

it('return int if not empty', function () {
    $data = [
        'num1' => '',
        'num2' => null,
        'num3' => '3',
        'num4' => 6,
    ];
    expect(Parser::intIfNotEmpty($data, 'num1'))
        ->toBeNull()
        ->and(Parser::intIfNotEmpty($data, 'num2'))
        ->toBeNull()
        ->and(Parser::intIfNotEmpty($data, 'num3'))
        ->toBe(3)
        ->and(Parser::intIfNotEmpty($data, 'num4'))
        ->toBe(6);
});
