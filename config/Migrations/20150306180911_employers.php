<?php

use Phinx\Migration\AbstractMigration;

class Employers extends AbstractMigration
{
    public function up()
    {
        $employers = $this->table('employers');
        $employers->addColumn('user_id', 'integer')
            ->addColumn('mobile', 'string', ['limit' => 20])
            ->addColumn('jobs_count', 'integer', ['default' => 0])
            ->addColumn('subscriptiion', 'string', ['limit' => 50, 'default' => 'free'])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();
    }

    public function down()
    {
        //$this->dropTable(['employers']);
    }
}