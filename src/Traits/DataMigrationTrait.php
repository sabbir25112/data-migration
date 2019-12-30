<?php namespace Sabbir25112\DataMigration\Traits;

use Sabbir25112\DataMigration\Installation;

trait DataMigrationTrait
{
    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        $data_migration_path = $this->laravel->databasePath().DIRECTORY_SEPARATOR.'data_migrations';
        Installation::setupDataMigrationPath($data_migration_path);
        return $data_migration_path;
    }
}
