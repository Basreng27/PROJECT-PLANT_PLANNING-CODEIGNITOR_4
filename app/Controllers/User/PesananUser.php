<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Keranjang_model;
use App\Models\Product_model;
use App\Models\Set_dashboard_model;

class PesananUser extends BaseController
{
    protected $KeranjangModel;
    protected $ProductModel;
    protected $Set_dashboardModel;

    public function __construct()
    {
        $this->KeranjangModel = new Keranjang_model();
        $this->ProductModel = new Product_model();
        $this->Set_dashboardModel = new Set_dashboard_model();
    }

    public function index()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        $data = [
            'validation' => \Config\Services::validation(),
            'data_keranjang' => $this->KeranjangModel->getKeranjangCheck(session()->get('id_user')),
            'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/User/pesanan_user', $data);
    }
}
