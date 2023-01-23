<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Tanamans_model;
use App\Models\Mari_tanam_model;

class Users extends BaseController
{
    protected $TanamanModel;
    protected $MariTanamModel;

    public function __construct()
    {
        $this->TanamanModel = new Tanamans_model();
        $this->MariTanamModel = new Mari_tanam_model();
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

        $data = [
            'validation' => \Config\Services::validation(),
            'data_saya_tanam' => $this->MariTanamModel->tanamXsayatanam(session()->get('id_user')),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/User/saya_tanam', $data);
    }

    public function detail($id_mari_tanam, $id_tanaman)
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        $data = [
            'validation' => \Config\Services::validation(),
            'data_pupuk_mari_tanam' => $this->MariTanamModel->sayatanamXtanamanXpupuk($id_mari_tanam),
            'tanaman' => $this->TanamanModel->find($id_tanaman),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/User/detail', $data);
    }
}
