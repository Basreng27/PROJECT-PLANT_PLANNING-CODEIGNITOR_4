<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
// use App\Models\Keranjang_model;

class Chat extends BaseController
{
    // protected $KeranjangModel;

    // public function __construct()
    // {
    //     $this->KeranjangModel = new Keranjang_model();
    // }

    public function index()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        // $data = [
        //     'data_keranjang' => $this->KeranjangModel->getKeranjang(session()->get('id_user'))
        // ];

        return view('Pages/User/chat');
    }
}
