<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
// use App\Models\Keranjang_model;

class Users extends BaseController
{
    // protected $KeranjangModel;

    // public function __construct()
    // {
    //     $this->Set_dashboardModel = new Set_dashboard_model();
    // }

    public function mariTanam()
    {
        // if (session()->get('stat') != 'login-user') {
        //     return redirect('/');
        // }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'data_keranjang' => $this->KeranjangModel->getKeranjang(session()->get('id_user')),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/User/mari_tanam');
    }

    public function sayaTanam()
    {
        // if (session()->get('stat') != 'login-user') {
        //     return redirect('/');
        // }

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
