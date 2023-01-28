<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Set_dashboard_model;

class SetDashboard extends BaseController
{
    protected $Set_dashboardModel;

    public function __construct()
    {
        $this->Set_dashboardModel = new Set_dashboard_model();
    }

    public function updateSet()
    {
        if (!$this->validate([
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-set-dashboard')->withInput();
        }

        $id_set_dashboard = $this->request->getVar('id_set_dashboard');
        //ambil iimage
        $pictureDashboard = $this->request->getFile('picture_dashboard');
        $logo = $this->request->getFile('logo');
        //cek image lama di ganti atau tidak
        if ($pictureDashboard->getError() == 4) {
            $namaPicture = $this->request->getVar('picture_lama');
            $namaLogo = $this->request->getVar('logo_lama');
        } else {
            //generate random nama image
            $namaPicture = $pictureDashboard->getRandomName();
            $namaLogo = $logo->getRandomName();

            $pictureDashboard->move('set_admin', $namaPicture);
            $logo->move('set_admin', $namaLogo);

            // cek jika default
            $review = $this->Set_dashboardModel->find($id_set_dashboard);
            if ($review['picture_dashboard'] != 'default.jpg') {
                //hapus file lama
                unlink('set_admin/' . $this->request->getVar('picture_lama'));
            }
            if ($review['logo'] != 'default.jpg') {
                //hapus file lama
                unlink('set_admin/' . $this->request->getVar('logo_lama'));
            }
        }

        $this->Set_dashboardModel->save([
            'id_set_dashboard' => $id_set_dashboard,
            'picture_dashboard' => $namaPicture,
            'logo' => $namaLogo,
            'deskripsi' => $this->request->getVar('deskripsi')
        ]);

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-set-dashboard');
    }
}
