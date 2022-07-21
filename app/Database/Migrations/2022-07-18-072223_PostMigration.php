<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PostMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'post_id'   =>  [
                'type'          =>  'INT',
                'auto_increment'=>  TRUE,
                'null'          =>  FALSE
            ],
            'category_id'   =>  [
                'type'          =>  'INT',
                'null'          =>  FALSE
            ],
            'user_id'       =>  [
                'type'          =>  'INT',
                'null'          =>  FALSE
            ],
            'title'         =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  256,
                'null'          =>  FALSE
            ],
            'slug'          =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  512,
                'null'          =>  FALSE
            ],
            'contents'      =>  [
                'type'          =>  'LONGTEXT',
                'null'          =>  FALSE
            ],
            'thumbnail'     =>  [
                'type'          =>  'VARCHAR',
                'constraint'    =>  128,
                'null'          =>  TRUE,
                'default'       =>  'default-thumbnail.png'
            ],
            'post_status'     =>  [
                'type'          =>  'INT',
                'constraint'    =>  1,
                'null'          =>  FALSE,
                'default'       =>  2
            ],
            'post_created_at'    =>  [
                'type'          =>  'TIMESTAMP',
                'null'          =>  TRUE,
                'default'       =>  NULL
            ],
            'post_updated_at'    =>  [
                'type'          =>  'TIMESTAMP',
                'null'          =>  TRUE,
                'default'       =>  NULL
            ],
            'post_deleted_at'    =>  [
                'type'          =>  'TIMESTAMP',
                'null'          =>  TRUE,
                'default'       =>  NULL
            ]
        ]);

        $this->forge->addPrimaryKey('post_id');
        $this->forge->addForeignKey('user_id', 'users', 'user_id');
        $this->forge->addForeignKey('category_id', 'category', 'category_id');
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
