<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Checkout_model;
use App\Models\No_wa_model;
use App\Models\Keranjang_model;

class Checkout extends BaseController
{
    protected $CheckoutModel;
    protected $No_waModel;
    protected $KeranjangModel;

    public function __construct()
    {
        $this->CheckoutModel = new Checkout_model();
        $this->No_waModel = new No_wa_model();
        $this->KeranjangModel = new Keranjang_model();
    }

    public function prosesCheckout()
    {
        if (session()->get('stat') != 'login-user') {
            return redirect('/');
        }

        if (!$this->validate([
            'lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan kekeranjang');
            return redirect()->to('/keranjang')->withInput();
        }

        $id_user = $this->request->getVar('id_user');
        $id_keranjang = $this->request->getVar('id_keranjang');
        $nama = $this->request->getVar('nama');
        $nama_madu = $this->request->getVar('nama_madu');
        // $jumlah = $this->request->getVar('jumlah');
        // $total = $this->request->getVar('total');
        $lokasi = $this->request->getVar('lokasi');

        $no = $this->No_waModel->find(1);

        $this->CheckoutModel->save([
            'id_user' => $id_user,
            'id_keranjang' => $id_keranjang,
            'lokasi' => $lokasi,
            'status' => 'Menunggu'
        ]);

        $this->KeranjangModel->save([
            'id_keranjang' => $id_keranjang,
            'status_keranjang' => 1
        ]);

        return redirect()->to('/keranjang');
        // return redirect()->to('https://api.whatsapp.com/send?phone=' . $no['no_wa'] . '&text=Halo%20Admin%20Saya%20Mau%20Order%20Product%20' . $nama_madu . '%0ADengan%20Kode%20:%20' . $id_keranjang . '%0AAtas%20Nama%20:%20' . $nama . '%0ALokasi%20Pengiriman%20/%20Alamat%20:%20' . $lokasi . '%0ATerimakasih');
    }
}
