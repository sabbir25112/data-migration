<?php namespace Sabbir25112\DataMigration;

use Illuminate\Database\Migrations\DatabaseMigrationRepository;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\ServiceProvider;
use Sabbir25112\DataMigration\Commands\DataMigrateCommand;
use Sabbir25112\DataMigration\Commands\DataMigrateInstallCommand;
use Sabbir25112\DataMigration\Commands\DataMigrateMakeCommand;
use Sabbir25112\DataMigration\Commands\DataMigrateRollbackCommand;

class DataMigrationServiceProvider extends ServiceProvider
{
    protected $defer = true;

    protected $commands = [
        'DataMigrateMake'       => 'command.data.migrate.make',
        'DataMigrate'           => 'command.data.migrate',
        'DataMigrateInstall'    => 'command.data.migrate.install',
        'DataMigrateRollback'   => 'command.data.migrate.rollback'
    ];

    public function register()
    {
        $this->registerRepository();

        $this->registerMigrator();

        $this->registerCreator();

        $this->registerCommands($this->commands);
    }

    protected function registerCreator()
    {
        $this->app->singleton('data.migration.creator', function ($app) {
            return new DataMigrationCreator($app['files']);
        });
    }

    protected function registerRepository()
    {
        $this->app->singleton('data.migration.repository', function ($app) {
            return new DatabaseMigrationRepository($app['db'], "data_migrations");
        });
    }

    protected function registerMigrator()
    {
        $this->app->singleton('data.migrator', function ($app) {
            $repository = $app['data.migration.repository'];

            return new Migrator($repository, $app['db'], $app['files'], $app['events']);
        });
    }

    protected function registerCommands(array $commands)
    {
        foreach (array_keys($commands) as $command) {
            call_user_func_array([$this, "register{$command}Command"], []);
        }

        $this->commands(array_values($commands));
    }

    protected function registerDataMigrateMakeCommand()
    {
        $this->app->singleton('command.data.migrate.make', function ($app) {

            $creator = $app['data.migration.creator'];
            $composer = $app['composer'];

            return new DataMigrateMakeCommand($creator, $composer);
        });
    }

    protected function registerDataMigrateCommand()
    {
        $this->app->singleton('command.data.migrate', function ($app) {
            return new DataMigrateCommand($app['data.migrator']);
        });
    }

    protected function registerDataMigrateInstallCommand()
    {
        $this->app->singleton('command.data.migrate.install', function ($app) {
            return new DataMigrateInstallCommand($app['data.migration.repository']);
        });
    }

    protected function registerDataMigrateRollbackCommand()
    {
        $this->app->singleton('command.data.migrate.rollback', function ($app) {
            return new DataMigrateRollbackCommand($app['data.migrator']);
        });
    }

    public function provides()
    {
        return array_merge([
            'data.migration.repository',
            'data.migration.creator',
            'data.migrator'
        ], array_values($this->commands));
    }
}
