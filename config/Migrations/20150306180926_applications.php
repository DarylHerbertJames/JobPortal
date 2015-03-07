<?php

use Phinx\Migration\AbstractMigration;

class Applications extends AbstractMigration
{
    public function up()
    {
        $applications = $this->table('applications');
        $applications->addColumn('user_id', 'integer')
            ->addColumn('job_id', 'integer')
            ->addColumn('message', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();
    }

    public function down()
    {
        //$this->dropTable('applications');
    }

}