<?php

use Phinx\Migration\AbstractMigration;

class Jobseekers extends AbstractMigration
{
    public function up()
    {
        $jobseekers = $this->table('jobseekers');
        $jobseekers->addColumn('user_id', 'integer')
            ->addColumn('age', 'integer', ['limit' => 10])
            ->addColumn('gender', 'string', ['limit' => 10])
            ->addColumn('mobile', 'string', ['limit' => 20, 'null' => true, 'default' => null])
            ->addColumn('about', 'text', ['null' => true, 'default' => null])
            ->addColumn('education', 'string', ['null' => true, 'default' => null])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->save();
    }

    public function down()
    {
        //$this->dropTable('jobseekers');
    }
}