<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Pupuks_model;

class Pupuks extends BaseController
{
    protected $PupuksModel;

    public function __construct()
    {
        $this->PupuksModel = new Pupuks_model();
    }

    public function prosesTambahPupuk()
    {
        $id_pupuk = $this->request->getVar('id_pupuk');
        $id_tanaman = $this->request->getVar('id_tanaman');
        $lama_pupuk = $this->request->getVar('lama_pupuk');
        $waktu_pupuk = $this->request->getVar('waktu_pupuk');
        $findPupukke = $this->PupuksModel->findPupuk_ke($id_tanaman);
        $pupuk_ke = $findPupukke[0]['pupuk_ke'] + 1;

        if (!empty($id_pupuk)) {
            $this->PupuksModel->save([
                'id_pupuk' => $id_pupuk,
                'pupuk_ke' => $pupuk_ke,
                'lama_pupuk' => $lama_pupuk,
                'id_tanaman' => $id_tanaman,
                'waktu_pupuk' => $waktu_pupuk
            ]);
        } else {
            $this->PupuksModel->save([
                'pupuk_ke' => $pupuk_ke,
                'lama_pupuk' => $lama_pupuk,
                'id_tanaman' => $id_tanaman,
                'waktu_pupuk' => $waktu_pupuk
            ]);
        }

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }

    public function prosesDeletePupuk()
    {
        $id = $this->request->getVar('id_pupuk');

        $this->PupuksModel->delete($id); //menghapus data didatabase
        session()->setFlashdata('delete', 'Data Berhasil dihapus');
        return redirect()->to('/admin-tanaman');
    }


    public function prosesUpdatePupuk($id_pupuk, $status_pupuk)
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        $this->PupuksModel->save([
            'id_pupuk' => $id_pupuk,
            'status_pupuk' => $status_pupuk,
        ]);

        return redirect()->to('/saya-tanam');
    }
}
