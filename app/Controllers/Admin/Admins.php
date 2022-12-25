<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Tanamans_model;

class Admins extends BaseController
{
    protected $TanamansModel;

    public function __construct()
    {
        $this->TanamansModel = new Tanamans_model();
    }

    public function index()
    {
        if (session()->get('stat') != 'login-admin') {
            if (session()->get('stat') == 'login-user') {
                return redirect()->to('/home');
            } else {
                return redirect()->to('/');
            }
        }

        // $data = [
        //     'validation' => \Config\Services::validation(),
        //     'set' => $this->Set_dashboardModel->find(1)
        // ];

        return view('Pages/Admin/home');
    }

    public function tanaman()
    {
        if (session()->get('stat') != 'login-admin') {
            if (session()->get('stat') == 'login-user') {
                return redirect()->to('/home');
            } else {
                return redirect()->to('/');
            }
        }

        $data = [
            'validation' => \Config\Services::validation(),
            'data_tanamans' => $this->TanamansModel->tanamanXartikelXbudidaya(),
            // 'set' => $this->Set_dashboardModel->find(1)
        ];

        return view('Pages/Admin/Tanaman/tanaman', $data);
    }

    //     public function review()
    //     {
    //         if (session()->get('stat') != 'login-admin') {
    //             if (session()->get('stat') == 'login-user') {
    //                 return redirect()->to('/home');
    //             } else {
    //                 return redirect()->to('/');
    //             }
    //         }

    //         $data = [
    //             'validation' => \Config\Services::validation(),
    //             'data_reviews' => $this->ReviewModel->findAll(),
    //             'set' => $this->Set_dashboardModel->find(1)
    //         ];

    //         return view('Pages/Admin/Review/review', $data);
    //     }

    //     // public function admin()
    //     // {
    //     //     if (session()->get('stat') != 'login-admin') {
    //     //         if (session()->get('stat') == 'login-user') {
    //     //             return redirect()->to('/home');
    //     //         } else {
    //     //             return redirect()->to('/');
    //     //         }
    //     //     }

    //     //     return view('Pages/Admin/Admin/admin');
    //     // }

    //     public function nomor()
    //     {
    //         if (session()->get('stat') != 'login-admin') {
    //             if (session()->get('stat') == 'login-user') {
    //                 return redirect()->to('/home');
    //             } else {
    //                 return redirect()->to('/');
    //             }
    //         }

    //         $data = [
    //             'validation' => \Config\Services::validation(),
    //             'data_nomor' => $this->No_waModel->findAll(),
    //             'set' => $this->Set_dashboardModel->find(1)
    //         ];

    //         return view('Pages/Admin/Nomor/no_admin', $data);
    //     }

    //     public function setDashboard()
    //     {
    //         if (session()->get('stat') != 'login-admin') {
    //             if (session()->get('stat') == 'login-user') {
    //                 return redirect()->to('/home');
    //             } else {
    //                 return redirect()->to('/');
    //             }
    //         }

    //         $data = [
    //             'validation' => \Config\Services::validation(),
    //             'data_set_dashboard' => $this->Set_dashboardModel->findAll(),
    //             'set' => $this->Set_dashboardModel->find(1)
    //         ];

    //         return view('Pages/Admin/Setting/set_dashboard', $data);
    //     }

    //     public function pesanan()
    //     {
    //         if (session()->get('stat') != 'login-admin') {
    //             if (session()->get('stat') == 'login-user') {
    //                 return redirect()->to('/home');
    //             } else {
    //                 return redirect()->to('/');
    //             }
    //         }

    //         $data = [
    //             'validation' => \Config\Services::validation(),
    //             'data_checkout' => $this->CheckoutModel->getCheckout(),
    //             'set' => $this->Set_dashboardModel->find(1)
    //         ];

    //         return view('Pages/Admin/Pesanan/pesanan', $data);
    //     }
}
