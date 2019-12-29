<?php namespace Sabbir25112\DataMigration\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Support\Composer;
use Sabbir25112\DataMigration\Traits\DataMigrationTrait;

class DataMigrateMakeCommand extends MigrateMakeCommand
{
    use DataMigrationTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:data-migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Data Migration';

    public function __construct(MigrationCreator $creator, Composer $composer)
    {
        parent::__construct($creator, $composer);
    }
}
