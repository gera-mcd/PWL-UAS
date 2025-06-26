<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Home extends BaseController
{
    public function login()
    {
        $data = [];
       echo view ("admin/v_login, $data");
    }
}
