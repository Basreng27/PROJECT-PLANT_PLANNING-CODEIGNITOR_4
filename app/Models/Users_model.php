<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'username', 'password'];

    public function getUser($username, $password)
    {
        return $this->where(['username' => $username, 'password' => $password])->first();
    }
}
