<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Artikels_model;

class Artikels extends BaseController
{
    protected $ArtikelsModel;

    public function __construct()
    {
        $this->ArtikelsModel = new Artikels_model();
    }

    public function prosesTambahArtikel()
    {
        dd($this->request->getVar());
        $this->ArtikelsModel->save([
            'isi_artikel' => $this->request->getVar('isi_artikel'),
            'id_tanaman' => $this->request->getVar('id_tanaman')
        ]);

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
        // }
    }
}
