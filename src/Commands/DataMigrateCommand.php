<?php namespace Sabbir25112\DataMigration\Commands;

use Illuminate\Database\Console\Migrations\MigrateCommand;
use Illuminate\Database\Migrations\Migrator;
use Sabbir25112\DataMigration\Traits\DataMigrationTrait;

class DataMigrateCommand extends MigrateCommand
{
    use DataMigrationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data-migrate {--database= : The database connection to use}
                {--force : Force the operation to run when in production}
                {--path=* : The path(s) to the migrations files to be executed}
                {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
                {--pretend : Dump the SQL queries that would be run}
                {--seed : Indicates if the seed task should be re-run}
                {--step : Force the migrations to be run so they can be rolled back individually}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Data Migration';

    public function __construct(Migrator $migrator)
    {
        parent::__construct($migrator);
    }

    protected function prepareDatabase()
    {
        $this->migrator->setConnection($this->option('database'));

        if (! $this->migrator->repositoryExists()) {
            $this->call('data-migration:install', array_filter([
                '--database' => $this->option('database'),
            ]));
        }
    }
}
