<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanamans_model extends Model
{
    protected $table = 'tanamans';
    protected $primaryKey = 'id_tanaman';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_tanaman', 'image_tanaman', 'lama', 'waktu', 'musim', 'keterangan'];

    public function tanamanXartikelXbudidaya()
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('artikels', 'artikels.id_tanaman = tanamans.id_tanaman', 'left');
        $this->join('budidayas', 'budidayas.id_tanaman = tanamans.id_tanaman', 'left');

        return $this->findAll();
    }

    public function tanamanXartikel($id_tanaman)
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('artikels', 'artikels.id_tanaman = tanamans.id_tanaman', 'left');
        $this->where(['tanamans.id_tanaman' => $id_tanaman]);

        return $this->findAll();
    }

    public function tanamanXbudidaya($id_tanaman)
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('budidayas', 'budidayas.id_tanaman = tanamans.id_tanaman', 'left');
        $this->where(['tanamans.id_tanaman' => $id_tanaman]);

        return $this->findAll();
    }
}
