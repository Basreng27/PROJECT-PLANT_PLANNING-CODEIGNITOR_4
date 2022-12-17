<?php

namespace App\Models;

use CodeIgniter\Model;

class Review_model extends Model
{
    protected $table = 'review';
    protected $primaryKey = 'id_review';
    protected $useTimestamps = false;
    protected $allowedFields = ['image_review', 'urutan'];
}
