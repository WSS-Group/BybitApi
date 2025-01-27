<?php

use BybitApi\Conditional;

it('remove unnecessary from array', function () {
    expect(Conditional::array([
        'line1' => 'abc',
        'line2' => new Conditional,
        'line3' => true,
        'line4' => '',
        'line5' => null,
    ]))
        ->toBeArray()
        ->toHaveKeys(['line1', 'line3', 'line4', 'line5'])
        ->not
        ->toHaveKey('line2');
});

it('return conditional instance on null', function () {
    expect(Conditional::ifNotNull('abc'))
        ->toBe('abc')
        ->and(Conditional::ifNotNull(''))
        ->toBe('')
        ->and(Conditional::ifNotNull(true))
        ->toBe(true)
        ->and(Conditional::ifNotNull(12))
        ->toBe(12)
        ->and(Conditional::ifNotNull(null))
        ->toBeInstanceOf(Conditional::class);
});

it('return conditional instance on empty', function () {
    expect(Conditional::ifNotEmpty('abc'))
        ->toBe('abc')
        ->and(Conditional::ifNotEmpty(true))
        ->toBe(true)
        ->and(Conditional::ifNotEmpty(12))
        ->toBe(12)
        ->and(Conditional::ifNotEmpty(''))
        ->toBeInstanceOf(Conditional::class)
        ->and(Conditional::ifNotEmpty(null))
        ->toBeInstanceOf(Conditional::class);
});
