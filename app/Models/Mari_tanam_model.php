<?php

namespace App\Models;

use CodeIgniter\Model;

class Mari_tanam_model extends Model
{
    protected $table = 'mari_tanam';
    protected $primaryKey = 'id_mari_tanam';
    protected $useTimestamps = false;
    protected $allowedFields = ['dari_tanggal', 'perkiraan_panen', 'id_tanaman', 'id_user', 'bibit'];

    public function tanamXsayatanam($id_user)
    {
        $this->join('tanamans', 'mari_tanam.id_tanaman = tanamans.id_tanaman', 'left');
        $this->where(['id_user' => $id_user]);

        return $this->find();
    }

    public function sayatanamXtanamanXpupuk($id_mari_tanam)
    {
        $this->join('tanamans', 'mari_tanam.id_tanaman = tanamans.id_tanaman', 'left');
        $this->join('pupuks', 'tanamans.id_tanaman = pupuks.id_tanaman', 'left');
        $this->where(['id_mari_tanam' => $id_mari_tanam]);
        $this->orderBy('pupuks.pupuk_ke');

        return $this->find();
    }

    public function sayatanamXtanamanXsemprot($id_mari_tanam)
    {
        $this->join('tanamans', 'mari_tanam.id_tanaman = tanamans.id_tanaman', 'left');
        $this->join('semprot', 'tanamans.id_tanaman = semprot.id_tanaman', 'left');
        $this->where(['id_mari_tanam' => $id_mari_tanam]);
        $this->orderBy('semprot.semprot_ke');

        return $this->find();
    }
}
