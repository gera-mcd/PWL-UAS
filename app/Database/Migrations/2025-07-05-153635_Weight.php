<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Weight extends Migration
{
    public function up()
    {
        $fields = [
            'weight' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
                'after' => 'jumlah' // place after 'jumlah' column
            ]
        ];
        $this->forge->addColumn('product', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('product', 'weight');
    }
}
