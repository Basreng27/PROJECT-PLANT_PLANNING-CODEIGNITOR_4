<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\No_wa_model;

class Nomor extends BaseController
{
    protected $No_waModel;

    public function __construct()
    {
        $this->No_waModel = new No_wa_model();
    }

    public function prosesUpdateNomor()
    {
        if (!$this->validate([
            'no_wa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    // 'is_unique' => '{field} harus berbeda'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-nomor')->withInput();
        }

        $id_wa = $this->request->getVar('id_wa');
        $no_wa = $this->request->getVar('no_wa');

        $this->No_waModel->save([
            'id_wa' => $id_wa,
            'no_wa' => $no_wa
        ]);

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-nomor');
        // }
    }
}
