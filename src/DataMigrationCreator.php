<?php namespace Sabbir25112\DataMigration;

use Illuminate\Database\Migrations\MigrationCreator;

class DataMigrationCreator extends MigrationCreator
{
    public function stubPath()
    {
        return __DIR__.'/Stubs';
    }

    protected function getStub($table, $create)
    {
        return $this->files->get($this->stubPath().'/blank.stub');
    }
}
