<?php

namespace App\Models;

use CodeIgniter\Model;

class Budidayas_model extends Model
{
    protected $table = 'budidayas';
    protected $primaryKey = 'id_budidaya';
    protected $useTimestamps = false;
    protected $allowedFields = ['isi_budidaya', 'id_tanaman'];
}
