<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Pengguna extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Manajemen Pengguna',
            'users' => $this->userModel->getDaftarUser(),
        ];

        return view('admin/pengguna/index', $data);
    }

    public function toggleAktif(int $id)
    {
        // Proteksi: admin tidak bisa menonaktifkan akun miliknya sendiri
        if ($id === (int) session()->get('user_id')) {
            session()->setFlashdata('error', 'Anda tidak dapat menonaktifkan atau mengubah status akun Anda sendiri.');
            return redirect()->back();
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->back();
        }

        $newAktif = ($user['aktif'] == 1) ? 0 : 1;
        $this->userModel->update($id, ['aktif' => $newAktif]);

        $statusStr = $newAktif ? 'diaktifkan' : 'dinonaktifkan';
        session()->setFlashdata('sukses', "Akun pengguna {$user['username']} berhasil {$statusStr}.");
        return redirect()->back();
    }

    public function ubahRole(int $id)
    {
        // Proteksi: admin tidak bisa mengubah role akun miliknya sendiri
        if ($id === (int) session()->get('user_id')) {
            session()->setFlashdata('error', 'Anda tidak dapat mengubah role akun Anda sendiri.');
            return redirect()->back();
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            session()->setFlashdata('error', 'Pengguna tidak ditemukan.');
            return redirect()->back();
        }

        $newRole = $this->request->getPost('role');
        if (!in_array($newRole, ['admin', 'petugas', 'anggota'])) {
            session()->setFlashdata('error', 'Role tidak valid.');
            return redirect()->back();
        }

        $this->userModel->update($id, ['role' => $newRole]);

        session()->setFlashdata('sukses', "Role pengguna {$user['username']} berhasil diubah menjadi {$newRole}.");
        return redirect()->back();
    }
}
