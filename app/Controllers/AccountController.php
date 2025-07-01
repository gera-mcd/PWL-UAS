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
        helper(['form', 'url']);
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

    public function updateAccount()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $currentUsername = $session->get('username');

        $user = $this->userModel->where('username', $currentUsername)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $newUsername = $this->request->getPost('username');
        $newEmail    = $this->request->getPost('email');

        $this->userModel->update($user['id'], [
            'username' => $newUsername,
            'email'    => $newEmail,
        ]);

        // Update session jika username berubah
        $session->set('username', $newUsername);

        return redirect()->to('/account')->with('success', 'Akun berhasil diperbarui.');
    }
}
