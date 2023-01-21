<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Tanamans_model;
use App\Models\Pupuks_model;

class Admins extends BaseController
{
    protected $TanamansModel;
    protected $PupuksModel;

    public function __construct()
    {
        $this->TanamansModel = new Tanamans_model();
        $this->PupuksModel = new Pupuks_model();
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

    public function tanamanArtikel($id_tanaman)
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
            'data_artikel' => $this->TanamansModel->tanamanXartikel($id_tanaman)
        ];

        return view('Pages/Admin/Tanaman/artikel', $data);
    }

    public function tanamanBudidaya($id_tanaman)
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
            'data_budidaya' => $this->TanamansModel->tanamanXbudidaya($id_tanaman)
        ];

        return view('Pages/Admin/Tanaman/budidaya', $data);
    }

    public function tanamanPupuk($id_tanaman)
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
            'id_tanaman' => $id_tanaman,
            'data_pupuk' => $this->PupuksModel->where(['id_tanaman' => $id_tanaman])->findAll()
        ];
        return view('Pages/Admin/Tanaman/pupuk', $data);
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
