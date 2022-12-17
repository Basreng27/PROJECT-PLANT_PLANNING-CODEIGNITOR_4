<?php

namespace App\Models;

use CodeIgniter\Model;

class Checkout_model extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'id_checkout';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_keranjang', 'id_user', 'lokasi', 'status', 'keterangan'];

    public function getCheckout()
    {
        $this->select('*');
        $this->join('keranjang', 'checkout.id_keranjang = keranjang.id_keranjang', 'left');
        $this->join('product', 'keranjang.id_madu = product.id_madu', 'left');
        $this->join('users', 'checkout.id_user = users.id_user', 'left');
        $this->orderBy('checkout.status', 'asc');

        return $this->findAll();
    }
}
