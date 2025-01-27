<?php

namespace BybitApi\Tests;

use BybitApi\BybitActor;
use BybitApi\BybitApiServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Orchestra\Testbench\TestCase as Orchestra;
use Saloon\Config;
use Saloon\Http\Faking\MockClient;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        MockClient::destroyGlobal();
        Config::preventStrayRequests();
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'BybitApi\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    public function defaultActor(): BybitActor
    {
        return new BybitActor(
            Str::random(),
            Str::uuid()->toString(),
            test: true,
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            BybitApiServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
         foreach (\Illuminate\Support\Facades\File::allFiles(__DIR__ . '/database/migrations') as $migration) {
            (include $migration->getRealPath())->up();
         }
         */
    }
}
