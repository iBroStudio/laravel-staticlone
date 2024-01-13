<?php

namespace IBroStudio\StatiClone;

use IBroStudio\StatiClone\Commands\StatiCloneCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StatiCloneServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-staticlone')
            ->hasConfigFile()
            ->hasMigration('create_staticlone_tables')
            ->hasCommand(StatiCloneCommand::class);
    }
}
