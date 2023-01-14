<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Budidayas_model;

class Budidayas extends BaseController
{
    protected $BudidayasModel;

    public function __construct()
    {
        $this->BudidayasModel = new Budidayas_model();
    }

    public function prosesTambahBudidaya()
    {
        $id_budidaya = $this->request->getVar('id_budidaya');
        $id_tanaman = $this->request->getVar('id_tanaman');
        $isi_budidaya = $this->request->getVar('isi_budidaya');

        if (!empty($id_budidaya)) {
            $this->BudidayasModel->save([
                'id_budidaya' => $id_budidaya,
                'id_tanaman' => $id_tanaman,
                'isi_budidaya' => $isi_budidaya
            ]);
        } else {
            $this->BudidayasModel->save([
                'id_tanaman' => $id_tanaman,
                'isi_budidaya' => $isi_budidaya
            ]);
        }

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }
}
