<?php

namespace App\Controllers;

use App\Models\UserModel;

class Akun extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function gantiPassword(): string
    {
        return view('akun/ganti_password', ['title' => 'Ganti Password']);
    }

    public function prosesGantiPassword()
    {
        $rules = [
            'password_lama' => [
                'label' => 'Password Lama',
                'rules' => 'required'
            ],
            'password_baru' => [
                'label' => 'Password Baru',
                'rules' => 'required|min_length[8]',
                'errors' => ['min_length' => 'Password baru minimal {param} karakter.']
            ],
            'konfirmasi_password' => [
                'label' => 'Konfirmasi Password Baru',
                'rules' => 'required|matches[password_baru]',
                'errors' => ['matches' => 'Konfirmasi password tidak cocok.']
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        if (!password_verify($this->request->getPost('password_lama'), $user['password'])) {
            session()->setFlashdata('error', 'Password lama tidak sesuai.');
            return redirect()->back();
        }

        $this->userModel->update($userId, [
            'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('sukses', 'Password berhasil diubah.');
        return redirect()->to('/');
    }
}
