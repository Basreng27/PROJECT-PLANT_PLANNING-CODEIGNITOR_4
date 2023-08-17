<?php

namespace App\Models;

use CodeIgniter\Model;

class Semprot_model extends Model
{
    protected $table = 'semprot';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['semprot_ke', 'waktu', 'id_tanaman', 'lama', 'status'];

    public function findSemprot_ke($id_tanaman)
    {
        $this->selectMax('semprot_ke');
        $this->where(['id_tanaman' => $id_tanaman]);

        return $this->find();
    }
}
