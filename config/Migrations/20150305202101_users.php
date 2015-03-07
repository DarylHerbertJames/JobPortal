<?php

use Phinx\Migration\AbstractMigration;

class Users extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('users');
        $users->addColumn('email', 'string', ['limit' => 150])
            ->addColumn('password', 'string', ['limit' => 255])
            ->addColumn('role', 'string', ['limit' => 50])
            ->addColumn('first_name', 'string', ['limit' => 50, 'null' => true, 'default' => null])
            ->addColumn('last_name', 'string', ['limit' => 50])
            ->addColumn('reset_pass_token', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('reset_pass_created', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('avatar', 'string', ['limit' => 255, 'null' => true, 'default' => null])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
            ->addColumn('last_login', 'datetime', ['null' => true, 'default' => null])
            ->save();
    }

    public function down()
    {
        //$this->dropTable('users');
    }
}