<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RolesMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id'   =>  [
                'type'          =>  'INT',
                'constraint'    =>  0,
                'auto_increment'    =>  TRUE,
                'null'          =>  FALSE
            ],
            'type'  =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  128,
                'null'          =>  FALSE
            ]
        ]);

        $this->forge->addPrimaryKey('role_id');
        $this->forge->createTable('roles');
    }

    public function down()
    {
        $this->forge->dropTable('roles');
    }
}
