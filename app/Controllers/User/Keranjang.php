<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Keranjang_model;
use App\Models\Product_model;

class Keranjang extends BaseController
{
    protected $KeranjangModel;
    protected $ProductModel;

    public function __construct()
    {
        $this->KeranjangModel = new Keranjang_model();
        $this->ProductModel = new Product_model();
    }

    public function prosesTambahKeranjang()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        if (!$this->validate([
            'id_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'id_madu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_madu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'harga' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'sisa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
            'jumlah' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan kekeranjang');
            return redirect()->to('/product')->withInput();
        }

        $id_madu = $this->request->getVar('id_madu');
        $madu = $this->ProductModel->find($id_madu);

        //cek jika jumlah melebihi sisa
        if ($madu['sisa'] < $this->request->getVar('jumlah')) {
            session()->setFlashdata('gagalSisa', 'jumlah lebih besar dari sisa');
            return redirect()->to('/product')->withInput();
        }

        $harga = $madu['harga'];
        $jumlah = $this->request->getVar('jumlah');
        $total = $harga * $jumlah;

        $this->KeranjangModel->save([
            'id_user' => $this->request->getVar('id_user'),
            'id_madu' => $id_madu,
            'jumlah' => $jumlah,
            'total' => $total,
            'status_keranjang' => 0
        ]);

        // return redirect()->to('/keranjang');
        return redirect()->to('/product');
    }
}
