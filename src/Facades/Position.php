<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;

/**
 *
 * @method CursorCollection<int, Info> getPositionInfo(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?int $limit = null, ?string $cursor = null)
 *
 * @see \BybitApi\Groups\Position
 */
class Position extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Position::class;
    }
}
