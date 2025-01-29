<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;
use BybitApi\DTOs\Market\InstrumentInfo\Option;
use BybitApi\DTOs\Market\InstrumentInfo\Spot;
use BybitApi\DTOs\Market\Kline;
use BybitApi\DTOs\Market\Ticker;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\SymbolStatus;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * @method Carbon getBybitServerTime()
 * @method Collection<int, Kline> getKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method Collection<string, LinearInverse|Option|Spot>|LinearInverse|Option|Spot getInstrumentsInfo(Category $category, null|BackedEnum|string $symbol = null, null|SymbolStatus $status = null, null|BackedEnum|string $baseCoin = null, null|int $limit = null, null|string $cursor = null)
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
