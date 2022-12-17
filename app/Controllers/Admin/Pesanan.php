<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Checkout_model;
use App\Models\Keranjang_model;
use App\Models\Product_model;

class Pesanan extends BaseController
{
    protected $CheckoutModel;
    protected $KeranjangModel;
    protected $ProductModel;

    public function __construct()
    {
        $this->CheckoutModel = new Checkout_model();
        $this->KeranjangModel = new Keranjang_model();
        $this->ProductModel = new Product_model();
    }

    public function pesananSetuju($id_checkout)
    {
        $checkout = $this->CheckoutModel->find($id_checkout);
        $keranjang = $this->KeranjangModel->find($checkout['id_keranjang']);
        $product = $this->ProductModel->find($keranjang['id_madu']);

        if ($product['sisa'] < $keranjang['jumlah']) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-pesanan')->withInput();
        }

        $totalSisa =  $product['sisa'] - $keranjang['jumlah'];

        $this->ProductModel->save([
            'id_madu' => $keranjang['id_madu'],
            'sisa' => $totalSisa
        ]);

        $this->CheckoutModel->save([
            'id_checkout' => $id_checkout,
            'status' => 'Setuju'
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-pesanan');
    }

    public function pesananTolak()
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('gagalTolak', 'Data gagal ditambahkan');
            return redirect()->to('/admin-pesanan')->withInput();
        }

        $this->CheckoutModel->save([
            'id_checkout' => $this->request->getVar('id_checkout'),
            'status' => 'Tolak',
            'keterangan' => $this->request->getVar('keterangan')
        ]);

        session()->setFlashdata('berhasilTolak', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-pesanan');
    }
}
