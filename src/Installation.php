<?php namespace Sabbir25112\DataMigration;

use Sabbir25112\DataMigration\Traits\DataMigrationTrait;

class Installation
{
    use DataMigrationTrait;

    public static function setupDataMigrationPath()
    {
        $data_migration_path = (new static())->getMigrationPath();

        if (!file_exists($data_migration_path)) {
            mkdir($data_migration_path, '0644');
        }
    }
}
