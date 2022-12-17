<?php

namespace App\Models;

use CodeIgniter\Model;

class No_wa_model extends Model
{
    protected $table = 'no_wa';
    protected $primaryKey = 'id_wa';
    protected $useTimestamps = false;
    protected $allowedFields = ['no_wa'];
}
