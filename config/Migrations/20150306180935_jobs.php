<?php

use Phinx\Migration\AbstractMigration;

class Jobs extends AbstractMigration
{
    public function up()
    {
        $jobs = $this->table('jobs');
        $jobs->addColumn('user_id', 'integer')
            ->addColumn('category_id', 'integer')
            ->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addColumn('type', 'string', ['limit' => 100])
            ->addColumn('salary', 'string', ['limit' => 50])
            ->addColumn('applications_count', 'integer')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();
    }

    public function down()
    {
        //$this->dropTable('jobs');
    }
}