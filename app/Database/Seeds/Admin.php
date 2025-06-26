<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        //
        $data = [
            'username'=>'admin',
            'password'=>password_hash('1234567',PASSWORD_DEFAULT),
            'nama_lengkap'=>'Yosafat Goradipa Bakti',
            'email'=>'Yosafat@gmail.com'
        ];
        $this->db->table('admin')->insert($data);
        
    }
}
