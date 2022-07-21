<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CategoryMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id'   =>  [
                'type'          =>  'INT',
                'constraint'    =>  0,
                'null'          =>  FALSE,
                'auto_increment'=>  TRUE
            ],
            'name'          =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  128,
                'null'          =>  FALSE
            ],
            'description'   =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  256,
                'null'          =>  FALSE
            ],
            'created_at'    =>  [
                'type'          =>  'TIMESTAMP',
                'null'          =>  TRUE,
                'default'       =>  NULL
            ],
            'updated_at'    =>  [
                'type'          =>  'TIMESTAMP',
                'null'          =>  TRUE,
                'default'       =>  NULL
            ]
        ]);

        $this->forge->addPrimaryKey('category_id');
        $this->forge->createTable('categories');
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
