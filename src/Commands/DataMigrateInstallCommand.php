<?php namespace Sabbir25112\DataMigration\Commands;

use Illuminate\Database\Console\Migrations\InstallCommand;

class DataMigrateInstallCommand extends InstallCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data-migration:install {--database= : The database connection to use}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Data Migration';
}
