<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // membuat data
        $data = [
           
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('product')->insert($item);
        }
    }
}