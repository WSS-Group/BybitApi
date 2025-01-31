<?php

use BybitApi\BybitActor;
use BybitApi\Facades\Market;
use BybitApi\Http\Integrations\Bybit\Requests\Market\GetBybitServerTime;
use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;

it('check if referer is appended when it is present', function () {
    MockClient::global([
        GetBybitServerTime::class => function (PendingRequest $pendingRequest) {
            expect($pendingRequest->headers()->get('X-Referer'))
                ->toBe('foo_bar');
            $current = now();
            return MockResponse::make([
                'retCode' => 0,
                'retMsg' => 'OK',
                'result' => [
                    'timeSecond' => $current->getTimestamp(),
                    'timeNano' => strval((int) $current->getPreciseTimestamp(9)),
                ],
                'retExtInfo' => [],
                'time' => $current->getTimestampMs(),
            ]);
        },
    ]);

    $actor = new BybitActor(
        Str::random(),
        Str::uuid()->toString(),
        referer: 'foo_bar',
        test: true,
    );

    $result = Market::actingAs($actor)->getBybitServerTime();

    expect($result)
        ->toBeInstanceOf(Carbon::class);
});

it('check if referer is null when it is\'t present', function () {
    MockClient::global([
        GetBybitServerTime::class => function (PendingRequest $pendingRequest) {
            expect($pendingRequest->headers()->get('X-Referer'))
                ->toBeNull();
            $current = now();
            return MockResponse::make([
                'retCode' => 0,
                'retMsg' => 'OK',
                'result' => [
                    'timeSecond' => $current->getTimestamp(),
                    'timeNano' => strval((int) $current->getPreciseTimestamp(9)),
                ],
                'retExtInfo' => [],
                'time' => $current->getTimestampMs(),
            ]);
        },
    ]);

    $actor = new BybitActor(
        Str::random(),
        Str::uuid()->toString(),
        test: true,
    );

    $result = Market::actingAs($actor)->getBybitServerTime();

    expect($result)
        ->toBeInstanceOf(Carbon::class);
});
