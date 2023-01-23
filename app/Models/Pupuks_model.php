<?php

namespace App\Models;

use CodeIgniter\Model;

class Pupuks_model extends Model
{
    protected $table = 'pupuks';
    protected $primaryKey = 'id_pupuk';
    protected $useTimestamps = false;
    protected $allowedFields = ['pupuk_ke', 'waktu_pupuk', 'id_tanaman', 'lama_pupuk', 'status_pupuk'];

    public function findPupuk_ke($id_tanaman)
    {
        $this->selectMax('pupuk_ke');
        $this->where(['id_tanaman' => $id_tanaman]);

        return $this->find();
    }
}
