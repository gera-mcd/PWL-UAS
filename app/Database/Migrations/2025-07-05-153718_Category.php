<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddWeightToProduct extends Migration
{
    public function up()
    {
        $fields = [
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'nama' // place after 'nama' column
            ],
        ];
        $this->forge->addColumn('product', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('product', 'category');
    }
}
