<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Tanamans_model;

class Users extends BaseController
{
    protected $TanamanModel;

    public function __construct()
    {
        $this->TanamanModel = new Tanamans_model();
    }

    public function mariTanam()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'data_tanaman' => $this->TanamanModel->findAll(),
            // 'data_keranjang' => $this->KeranjangModel->getKeranjang(session()->get('id_user')),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/User/mari_tanam', $data);
    }

    public function sayaTanam()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'data_keranjang' => $this->KeranjangModel->getKeranjang(session()->get('id_user')),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/saya_tanam');
    }

    public function detail()
    {
        // if (session()->get('stat') != 'login-user') {
        //     return redirect('/');
        // }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'data_keranjang' => $this->KeranjangModel->getKeranjang(session()->get('id_user')),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/detail');
    }
}
