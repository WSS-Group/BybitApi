<?php

namespace BybitApi\Facades;

use BackedEnum;
use BybitApi\CursorCollection;
use BybitApi\DTOs\Market\InstrumentInfo\LinearInverse;
use BybitApi\DTOs\Market\InstrumentInfo\Option;
use BybitApi\DTOs\Market\InstrumentInfo\Spot;
use BybitApi\DTOs\Market\Kline;
use BybitApi\DTOs\Market\MarkIndexPriceKline;
use BybitApi\DTOs\Market\Ticker\LinearInverse as TickerLinearInverse;
use BybitApi\DTOs\Market\Ticker\Option as TickerOption;
use BybitApi\DTOs\Market\Ticker\Spot as TickerSpot;
use BybitApi\Enums\Category;
use BybitApi\Enums\Interval;
use BybitApi\Enums\SymbolStatus;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * @method Carbon getBybitServerTime()
 * @method Collection<int, Kline> getKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method Collection<int, MarkIndexPriceKline> getMarkPriceKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method Collection<int, MarkIndexPriceKline> getIndexPriceKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method Collection<int, MarkIndexPriceKline> getPremiumIndexPriceKline(BackedEnum|string $symbol, Interval $interval, ?Category $category = null, ?Carbon $start = null, ?Carbon $end = null, ?int $limit = null)
 * @method CursorCollection<string, LinearInverse|Option|Spot>|LinearInverse|Option|Spot getInstrumentsInfo(Category $category, null|BackedEnum|string $symbol = null, null|SymbolStatus $status = null, null|BackedEnum|string $baseCoin = null, null|int $limit = null, null|string $cursor = null)
 * @method Collection<string, TickerLinearInverse|TickerOption|TickerSpot>|TickerLinearInverse|TickerOption|TickerSpot getTickers(Category $category, BackedEnum|string|null $symbol = null, BackedEnum|string|null $baseCoin = null, ?string $expDate = null)
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
