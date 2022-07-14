<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UsersMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id'   =>  [
                'type'          =>  'INT',
                'constraint'    =>  0,
                'auto_increment'=>  TRUE
            ],
            'first_name'    =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  128,
                'null'          =>  FALSE
            ],
            'last_name'     =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  128,
                'null'          =>  FALSE
            ],
            'email'         =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  256,
                'null'          =>  FALSE
            ],
            'username'         =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  256,
                'null'          =>  FALSE
            ],
            'password'         =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  512,
                'null'          =>  FALSE
            ],
            'avatar'            =>  [
                'type'              =>  'VARCHAR',
                'constraint'        =>  128,
                'null'              =>  FALSE,
            ],
            'user_whoami'       =>  [
                'type'              =>  'TEXT',
                'constraint'        =>  500,
                'null'              =>  FALSE,
            ],
            'status_activation' =>  [
                'type'              =>  'INT',
                'constraint'        =>  1,
                'null'              =>  FALSE
            ],
            'role_id' =>  [
                'type'              =>  'INT',
                'constraint'        =>  0,
                'null'              =>  FALSE
            ],
            'last_login' => [
                'type'              =>  'TIMESTAMP',
                'null'              =>  TRUE,
                'default'           =>  NULL
            ],
            'created_at' => [
                'type'              =>  'TIMESTAMP',
                'null'              =>  TRUE,
                'default'           =>  NULL
            ],
            'updated_at' => [
                'type'              =>  'TIMESTAMP',
                'null'              =>  TRUE,
                'default'           =>  NULL
            ]
        ]);

        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
