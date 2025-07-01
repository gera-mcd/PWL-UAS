<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AccountController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper('form');
    }

    public function profile()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $data = [
            'username' => $session->get('username'),
            'role' => $session->get('role'),
            'title' => 'Profile'
        ];

        return view('v_profile', $data);
    }

    public function account()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $username = $session->get('username');
        $userData = $this->userModel->where('username', $username)->first();

        $data = [
            'user' => $userData,
            'title' => 'Account Details'
        ];

        return view('v_account', $data);
    }
}
