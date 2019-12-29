<?php namespace Sabbir25112\DataMigration\Traits;


trait DataMigrationTrait
{
    /**
     * Get migration path (either specified by '--path' option or default location).
     *
     * @return string
     */
    protected function getMigrationPath()
    {
        return $this->laravel->databasePath().DIRECTORY_SEPARATOR.'data_migrations';
    }
}
