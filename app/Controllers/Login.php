<?php

namespace App\Controllers;

use App\Models\Admins_model;

class Login extends BaseController
{
    protected $AdminsModel;

    public function __construct()
    {
        $this->AdminsModel = new Admins_model();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];
        return view('Pages/Static/login_regist/login', $data);
    }

    public function prosesLogin()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            return redirect()->to('/login')->withInput();
        }

        $username = $this->request->getVar('username');
        $password = md5($this->request->getVar('password'));

        $cekLogin = $this->AdminsModel->where(['username' => $username, 'password' => $password])->first();
        if (empty($cekLogin)) {
            //login user belum di setting
            $cekLoginUser = $this->UsersModel->getUser($username, $password);
            if (empty($cekLoginUser)) {
                session()->setFlashdata('gagal', 'Password atau Username salah');
                return redirect()->to('/login');
            } else {
                $data_session = array(
                    'id_user' => $cekLoginUser['id_user'],
                    'nama' => $cekLoginUser['nama'],
                    'username' => $cekLoginUser['username'],
                    'stat' => "login-user"
                );
                session()->set($data_session);

                return redirect()->to('/');
            }
        } else {
            $data_session = array(
                'nama_admin' => $cekLogin['nama_admin'],
                'username' => $cekLogin['username'],
                'stat' => "login-admin"
            );
            session()->set($data_session);

            return redirect()->to('/admin');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
