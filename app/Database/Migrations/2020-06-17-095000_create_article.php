<?php

namespace App\Database\Migrations;

class CreateArticle extends \CodeIgniter\Database\Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => TRUE
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '48'
            ],
            'content' => [
                'type' => 'VARCHAR',
                'constraint' => '5000'
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '48'
            ]
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('article');
    }

    public function down()
    {
        $this->forge->dropTable('article');
    }
}
