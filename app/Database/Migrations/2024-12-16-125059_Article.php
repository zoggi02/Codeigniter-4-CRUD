<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Article extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'article_id'           => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'article_title'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'article_content'    => [
                'type'           => 'TEXT',
                'null'           => TRUE,
            ],
            'article_created'    => [
                'type'           => 'TIMESTAMP',
                'default'        => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'article_modified'   => [
                'type'           => 'TIMESTAMP',
                'null'           => TRUE,
            ],
            'article_status'     =>  array(
                'type'           =>  "ENUM",
                'constraint'     =>  "'Active','Inactive'",
                'default'        =>  "Active"
            ),
        ]);
        $this->forge->addKey('article_id', TRUE);
        $this->forge->createTable('article');
    }

    public function down()
    {
        //
    }
}
