<?php

namespace BybitApi\Tests\DTO;

use BybitApi\DTOs\Casts\DTOArrayCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\FloatCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\Casts\TimestampCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\Category;

/**
 * @property string $model
 * @property string $brand
 * @property int $year
 * @property float $cost
 * @property \BybitApi\Enums\Category $category
 * @property \Illuminate\Support\Carbon $boughtAt
 * @property null|\BybitApi\Tests\DTO\Car $inspiration
 * @property null|Car[] $children
 */
class Car extends DTO
{
    public function aliases(): array
    {
        return [
            'brand_name' => 'brand',
        ];
    }

    public function casts(): array
    {
        return [
            'brand' => StringCast::class,
            'year' => IntCast::class,
            'cost' => FloatCast::class,
            'category' => new EnumCast(Category::class),
            'boughtAt' => TimestampCast::class,
            'inspiration' => Car::class,
            'children' => new DTOArrayCast(Car::class),
        ];
    }
}
