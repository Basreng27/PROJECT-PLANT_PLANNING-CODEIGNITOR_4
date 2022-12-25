<?php

namespace App\Models;

use CodeIgniter\Model;

class Artikels_model extends Model
{
    protected $table = 'artikels';
    protected $primaryKey = 'id_artikel';
    protected $useTimestamps = false;
    protected $allowedFields = ['isi_artikel', 'id_tanaman'];
}
