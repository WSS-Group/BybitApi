<?php

namespace BybitApi;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use BybitApi\Commands\BybitApiCommand;

class BybitApiServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('bybitapi')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_bybitapi_table')
            ->hasCommand(BybitApiCommand::class);
    }
}
