<?php namespace Sabbir25112\DataMigration;

class Installation
{
    public static function setupDataMigrationPath($data_migration_path)
    {
        if (!file_exists($data_migration_path)) {
            mkdir($data_migration_path, 0755);
        }
    }
}
