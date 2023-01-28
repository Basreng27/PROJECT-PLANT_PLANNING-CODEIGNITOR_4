<?php

namespace App\Controllers;

use App\Models\Tanamans_model;


class Main extends BaseController
{
    protected $TanamanModel;

    public function __construct()
    {
        $this->TanamanModel = new Tanamans_model();
    }

    public function index()
    {
        return view('Pages/User/home');
    }

    public function tanaman()
    {
        $data = [
            'data_tanaman' => $this->TanamanModel->findAll(),
        ];

        return view('Pages/User/tanaman', $data);
    }

    public function article($id_tanaman)
    {
        $data = [
            'data_artikel' => $this->TanamanModel->tanamanXartikel($id_tanaman),
        ];

        return view('Pages/User/article', $data);
    }

    public function cara($id_tanaman)
    {
        $data = [
            'data_artikel' => $this->TanamanModel->tanamanXbudidaya($id_tanaman),
        ];

        return view('Pages/User/cara', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');;
        $data = $this->TanamanModel->like(['nama_tanaman' => $keyword])->findAll();
        return json_encode($data);
    }
}
