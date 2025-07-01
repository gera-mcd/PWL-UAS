<?php

namespace App\Controllers;

use App\Models\UserModel;

class AccountController extends BaseController
{
    public function index()
    {
        $username = session()->get('username');
        $userModel = new UserModel();

        $data['user'] = $userModel->where('username', $username)->first();

        return view('v_account', $data);
    }

    public function update()
    {
        $sessionUsername = session()->get('username');
        $userModel = new UserModel();

        $user = $userModel->where('username', $sessionUsername)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan.');
        }

        $newUsername = $this->request->getPost('username');
        $newEmail    = $this->request->getPost('email');

        $userModel->update($user['id'], [
            'username' => $newUsername,
            'email'    => $newEmail,
        ]);

        // Perbarui session jika username diubah
        session()->set('username', $newUsername);

        return redirect()->to('/account')->with('success', 'Data berhasil diperbarui.');
    }
}
