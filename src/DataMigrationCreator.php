<?php namespace Sabbir25112\DataMigration;

use Illuminate\Database\Migrations\MigrationCreator;

class DataMigrationCreator extends MigrationCreator
{
    /**
     * Get the path to the Stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return __DIR__.'/Stubs';
    }
}
