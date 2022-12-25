<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Tanamans_model;

class Tanamans extends BaseController
{
    protected $TanamansModel;

    public function __construct()
    {
        $this->TanamansModel = new Tanamans_model();
    }

    public function prosesTambahTanaman()
    {
        if (!$this->validate([
            'nama_tanaman' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'image_tanaman' => [
                'rules' => 'max_size[image_tanaman,1024]|is_image[image_tanaman]|mime_in[image_tanaman,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar gambar'
                ]
            ],
            'lama' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
            'waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'musim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-tanaman')->withInput();
        }

        //ambil iimage
        $imageTanaman = $this->request->getFile('image_tanaman');
        //upload gambar default jika tidak diisi
        if ($imageTanaman->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            //generate random nama image
            $namaImage = $imageTanaman->getRandomName();
            $imageTanaman->move('tanam', $namaImage);
        }

        $this->TanamansModel->save([
            'nama_tanaman' => $this->request->getVar('nama_tanaman'),
            'image_tanaman' => $namaImage,
            'lama' => $this->request->getVar('lama'),
            'waktu' => $this->request->getVar('waktu'),
            'musim' => $this->request->getVar('musim'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }

    // public function prosesUpdateProduct()
    // {
    //     //untuk get data file
    //     // $this->request->getFile('file')

    //     if (!$this->validate([
    //         'nama_madu' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi'
    //             ]
    //         ],
    //         'image' => [
    //             // 'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
    //             'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
    //             'errors' => [
    //                 // 'uploaded' => '{field} harus di upload',
    //                 'max_size' => 'Gambar terlalu besar',
    //                 'is_image' => 'Yang anda pilih bukan gambar',
    //                 'mime_in' => 'Yang anda pilih bukan gambar'
    //             ]
    //         ],
    //         'deskripsi' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => '{field} harus diisi'
    //             ]
    //         ],
    //         'harga' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => '{field} harus diisi',
    //                 'numeric' => '{field} harus berisi angka saja'
    //             ]
    //         ],
    //         'sisa' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => '{field} harus diisi',
    //                 'numeric' => '{field} harus berisi angka saja'
    //             ]
    //         ],
    //         'stock' => [
    //             'rules' => 'required|numeric',
    //             'errors' => [
    //                 'required' => '{field} harus diisi',
    //                 'numeric' => '{field} harus berisi angka saja'
    //             ]
    //         ],
    //     ])) {
    //         session()->setFlashdata('gagal', 'Data gagal ditambahkan');
    //         return redirect()->to('/admin-product')->withInput();
    //     }

    //     //ambil iimage
    //     $imageMadu = $this->request->getFile('image');
    //     //cek image lama di ganti atau tidak
    //     if ($imageMadu->getError() == 4) {
    //         $namaImage = $this->request->getVar('image_lama');
    //     } else {

    //         //generate random nama image
    //         $namaImage = $imageMadu->getRandomName();
    //         $imageMadu->move('products', $namaImage);

    //         //cek jika default
    //         $product = $this->ProductModel->find($this->request->getVar('id_madu'));
    //         if ($product['image'] != 'default.jpg') {
    //             //hapus file lama
    //             unlink('products/' . $this->request->getVar('image_lama'));
    //         }
    //     }

    //     $this->ProductModel->save([
    //         'id_madu' => $this->request->getVar('id_madu'),
    //         'nama_madu' => $this->request->getVar('nama_madu'),
    //         'image' => $namaImage,
    //         'deskripsi' => $this->request->getVar('deskripsi'),
    //         'harga' => $this->request->getVar('harga'),
    //         'sisa' => $this->request->getVar('sisa'),
    //         'stock' => $this->request->getVar('stock'),
    //     ]);

    //     session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
    //     return redirect()->to('/admin-product');
    // }

    // public function deleteProduct()
    // {
    //     $id = $this->request->getVar('id_madu');
    //     //cari gambar berdasarkan id
    //     $product = $this->ProductModel->find($id);
    //     // cek jika file gambar default
    //     if ($product['image'] != 'default.jpg') {
    //         //hapus gambar dalam folder
    //         unlink('products/' . $product['image']);
    //     }

    //     $this->ProductModel->delete($id); //menghapus data didatabase
    //     session()->setFlashdata('delete', 'Data Berhasil dihapus');
    //     return redirect()->to('/admin-product');
    // }
}
