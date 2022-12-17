<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Product_model;

class Product extends BaseController
{
    protected $ProductModel;

    public function __construct()
    {
        $this->ProductModel = new Product_model();
    }

    public function prosesTambahProduct()
    {
        //untuk get data file
        // $this->request->getFile('file')

        if (!$this->validate([
            'nama_madu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'image' => [
                // 'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    // 'uploaded' => '{field} harus di upload',
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'deskripsi' => [
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
            'sisa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
            'stock' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-product')->withInput();
        }

        //ambil iimage
        $imageMadu = $this->request->getFile('image');
        //upload gambar default jika tidak diisi
        if ($imageMadu->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            //generate random nama image
            $namaImage = $imageMadu->getRandomName();
            $imageMadu->move('products', $namaImage);
        }

        $this->ProductModel->save([
            'nama_madu' => $this->request->getVar('nama_madu'),
            'image' => $namaImage,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'sisa' => $this->request->getVar('sisa'),
            'stock' => $this->request->getVar('stock'),
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-product');
    }

    public function prosesUpdateProduct()
    {
        //untuk get data file
        // $this->request->getFile('file')

        if (!$this->validate([
            'nama_madu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'image' => [
                // 'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    // 'uploaded' => '{field} harus di upload',
                    'max_size' => 'Gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'deskripsi' => [
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
            'sisa' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
            'stock' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'numeric' => '{field} harus berisi angka saja'
                ]
            ],
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-product')->withInput();
        }

        //ambil iimage
        $imageMadu = $this->request->getFile('image');
        //cek image lama di ganti atau tidak
        if ($imageMadu->getError() == 4) {
            $namaImage = $this->request->getVar('image_lama');
        } else {

            //generate random nama image
            $namaImage = $imageMadu->getRandomName();
            $imageMadu->move('products', $namaImage);

            //cek jika default
            $product = $this->ProductModel->find($this->request->getVar('id_madu'));
            if ($product['image'] != 'default.jpg') {
                //hapus file lama
                unlink('products/' . $this->request->getVar('image_lama'));
            }
        }

        $this->ProductModel->save([
            'id_madu' => $this->request->getVar('id_madu'),
            'nama_madu' => $this->request->getVar('nama_madu'),
            'image' => $namaImage,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'harga' => $this->request->getVar('harga'),
            'sisa' => $this->request->getVar('sisa'),
            'stock' => $this->request->getVar('stock'),
        ]);

        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-product');
    }

    public function deleteProduct()
    {
        $id = $this->request->getVar('id_madu');
        //cari gambar berdasarkan id
        $product = $this->ProductModel->find($id);
        // cek jika file gambar default
        if ($product['image'] != 'default.jpg') {
            //hapus gambar dalam folder
            unlink('products/' . $product['image']);
        }

        $this->ProductModel->delete($id); //menghapus data didatabase
        session()->setFlashdata('delete', 'Data Berhasil dihapus');
        return redirect()->to('/admin-product');
    }
}
