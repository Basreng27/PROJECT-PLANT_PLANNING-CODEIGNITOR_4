<?php

namespace App\Controllers;

use App\Models\Users_model;

class Regist extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new Users_model();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'gagal' => '',
        ];

        return view('Pages/Static/login_regist/regist', $data);
    }

    public function prosesRegist()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/regist')->withInput();
            $data['gagal'] = 'gagal';
            return view('Pages/Static/login_regist/regist', $data);
        }

        $this->UsersModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => md5($this->request->getVar('password')),
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/login');
    }
}
