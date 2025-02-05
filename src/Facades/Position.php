<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Position\Info;
use BybitApi\Enums\Category;
use BybitApi\Enums\PositionMode;

/**
 * @method CursorCollection<int, Info> getPositionInfo(Category $category, null|BackedEnum|string $symbol = null, null|BackedEnum|string $baseCoin = null, null|BackedEnum|string $settleCoin = null, ?int $limit = null, ?string $cursor = null)
 * @method true switchPositionMode(Category $category, PositionMode $mode, null|BackedEnum|string $symbol = null, null|BackedEnum|string $coin = null)
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
