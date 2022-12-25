<?php

namespace App\Models;

use CodeIgniter\Model;

class Admins_model extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_admin', 'username', 'password'];
}
