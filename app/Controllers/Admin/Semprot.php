<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Semprot_model;

class Semprot extends BaseController
{
    protected $SemprotModel;

    public function __construct()
    {
        $this->SemprotModel = new Semprot_model();
    }

    public function prosesTambahSemprot()
    {
        $id = $this->request->getVar('id');
        $id_tanaman = $this->request->getVar('id_tanaman');
        $lama = $this->request->getVar('lama');
        $waktu = $this->request->getVar('waktu');
        $findSemprotke = $this->SemprotModel->findSemprot_ke($id_tanaman);
        $semprot_ke = $findSemprotke[0]['semprot_ke'] + 1;

        if (!empty($id)) {
            $this->SemprotModel->save([
                'id' => $id,
                'semprot_ke' => $semprot_ke,
                'lama' => $lama,
                'id_tanaman' => $id_tanaman,
                'waktu' => $waktu
            ]);
        } else {
            $this->SemprotModel->save([
                'semprot_ke' => $semprot_ke,
                'lama' => $lama,
                'id_tanaman' => $id_tanaman,
                'waktu' => $waktu
            ]);
        }

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }

    public function prosesDeleteSemprot()
    {
        $id = $this->request->getVar('id');

        $this->SemprotModel->delete($id); //menghapus data didatabase
        session()->setFlashdata('delete', 'Data Berhasil dihapus');
        return redirect()->to('/admin-tanaman');
    }


    public function prosesUpdateSemprot($id, $status)
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        $this->SemprotModel->save([
            'id' => $id,
            'status' => $status,
        ]);

        return redirect()->to('/saya-tanam');
    }
}
