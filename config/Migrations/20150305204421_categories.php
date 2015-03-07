<?php

use Phinx\Migration\AbstractMigration;

class Categories extends AbstractMigration
{
    public function up()
    {
        $categories = $this->table('categories');
        $categories->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
          ->addColumn('lft', 'integer', ['null' => true, 'default' => null])
          ->addColumn('rght', 'integer', ['null' => true, 'default' => null])
          ->addColumn('name', 'string', ['limit' => 100])
          ->addColumn('description', 'string', ['limit' => 255, 'null' => true, 'default' => null])
          ->addColumn('created', 'datetime')
          ->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
          ->save();
    }

    public function down()
    {
        //$this->dropTable('categories');
    }
}