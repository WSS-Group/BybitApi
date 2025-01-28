<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Kline;
use BybitApi\DTOs\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * @method Carbon getBybitServerTime()
 * @method Collection<int, Kline> getKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method Collection<string, Ticker>|Ticker getTickers(Category $category, BackedEnum|string|null $symbol = null, BackedEnum|string|null $baseCoin = null, ?string $expDate = null)
 *
 * @see \BybitApi\Groups\Market
 */
class Market extends Group
{
    protected static function getFacadeAccessor(): string
    {
        return \BybitApi\Groups\Market::class;
    }
}
