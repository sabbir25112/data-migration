<?php namespace Sabbir25112\DataMigration\Commands;

use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Database\Migrations\Migrator;
use Sabbir25112\DataMigration\Traits\DataMigrationTrait;

class DataMigrateRollbackCommand extends RollbackCommand
{
    use DataMigrationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data-migrate:rollback {--database= : The database connection to use}
        {--pretend= : Dump the SQL queries that would be run}
        {--step= : The number of migrations to be reverted}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rollback Data Migration';

    public function __construct(Migrator $migrator)
    {
        parent::__construct($migrator);
    }
}
