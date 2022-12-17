<?php

namespace App\Models;

use CodeIgniter\Model;

class Keranjang_model extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_user', 'id_madu', 'jumlah', 'total', 'status_keranjang'];

    public function getKeranjang($id_user)
    {
        $this->select('*');
        $this->join('users', 'keranjang.id_user = users.id_user', 'left');
        $this->join('product', 'keranjang.id_madu = product.id_madu', 'left');
        $this->where(['keranjang.id_user' => $id_user]);
        $this->where(['keranjang.status_keranjang' => 0]);

        return $this->findAll();
    }

    public function getKeranjangCheck($id_user)
    {
        $this->select('*');
        $this->join('users', 'keranjang.id_user = users.id_user', 'left');
        $this->join('product', 'keranjang.id_madu = product.id_madu', 'left');
        $this->join('checkout', 'keranjang.id_keranjang = checkout.id_keranjang', 'left');
        $this->where(['keranjang.id_user' => $id_user]);
        $this->where(['keranjang.status_keranjang' => 1]);

        return $this->findAll();
    }
}
