<?php

namespace BybitApi\Http\Integrations\Bybit\Plugins;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Saloon\Contracts\ArrayStore;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\PendingRequest;
use Saloon\Repositories\Body\ArrayBodyRepository;
use UnitEnum;

trait HasFormattedParams
{
    public function bootHasFormattedParams(PendingRequest $pendingRequest): void
    {
        $request = $pendingRequest->getRequest();
        $this->checkAndFormatParams($request->query());
        if ($request instanceof HasBody) {
            $body = $request->body();
            $this->checkAndFormatParams($body);
        }
    }

    protected function checkAndFormatParams(ArrayBodyRepository|ArrayStore $store): void
    {
        foreach ($store->all() as $key => $value) {
            $store->merge([$key => $this->doParamsChanges($value)]);
        }
    }

    protected function doParamsChanges(mixed $value): mixed
    {
        return match (true) {
            $value instanceof UnitEnum => $value->value,
            $value instanceof Carbon => $value->getTimestampMs(),
            $value instanceof Collection => $value->implode(','),
            is_bool($value) => $value ? 'true' : 'false',
            is_int($value) => number_format($value, 0, '.', ''),
            is_float($value) => number_format($value, 8, '.', ''),
            is_array($value) => collect($value)->map(fn ($item) => $this->doParamsChanges($item))->toArray(),
            default => $value,
        };

    }
}
