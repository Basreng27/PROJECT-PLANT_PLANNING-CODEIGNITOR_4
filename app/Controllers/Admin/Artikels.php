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
        $id_artikel = $this->request->getVar('id_artikel');
        $id_tanaman = $this->request->getVar('id_tanaman');
        $isi_artikel = $this->request->getVar('isi_artikel');

        if (!empty($id_artikel)) {
            $this->ArtikelsModel->save([
                'id_artikel' => $id_artikel,
                'id_tanaman' => $id_tanaman,
                'isi_artikel' => $isi_artikel
            ]);
        } else {
            $this->ArtikelsModel->save([
                'id_tanaman' => $id_tanaman,
                'isi_artikel' => $isi_artikel
            ]);
        }

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }
}
