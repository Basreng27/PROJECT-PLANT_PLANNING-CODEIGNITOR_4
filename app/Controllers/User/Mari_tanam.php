<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Mari_tanam_model;

class Mari_tanam extends BaseController
{
    protected $MariTanamModel;

    public function __construct()
    {
        $this->MariTanamModel = new Mari_tanam_model();
    }

    public function prosesSaveTanam()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        if (!$this->validate([
            'dari_tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('dari', 'Data gagal ditambahkan kekeranjang');
            return redirect()->to('/mari-tanam')->withInput();
        }

        $this->MariTanamModel->save([
            'dari_tanggal' => $this->request->getVar('dari_tanggal'),
            'perkiraan_panen' => $this->request->getVar('perkiraan_panen'),
            'id_tanaman' => $this->request->getVar('id_tanaman'),
            'id_user' => $this->request->getVar('id_user'),
            'bibit' => $this->request->getVar('bibit')
        ]);

        session()->setFlashdata('berhasil', 'Data gagal ditambahkan kekeranjang');
        return redirect()->to('/mari-tanam');
    }
}
