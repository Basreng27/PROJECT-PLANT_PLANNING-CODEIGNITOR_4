<?php

namespace App\Models;

use CodeIgniter\Model;

class Product_model extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id_madu';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_madu', 'image', 'deskripsi', 'harga', 'sisa', 'stock'];
}
