<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\Review_model;

class Review extends BaseController
{
    protected $ReviewModel;

    public function __construct()
    {
        $this->ReviewModel = new Review_model();
    }

    public function prosesTambahReview()
    {
        if (!$this->validate([
            // 'image_review' => [
            //     // 'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
            //     'rules' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'max_size' => 'Gambar terlalu besar',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Yang anda pilih bukan gambar'
            //     ]
            // ],
            'urutan' => [
                'rules' => 'required|is_unique[review.urutan]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} harus berbeda'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-review')->withInput();
        }

        //ambil iimage
        $imageMadu = $this->request->getFile('image_review');
        //upload gambar default jika tidak diisi
        if ($imageMadu->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            //generate random nama image
            $namaImage = $imageMadu->getRandomName();
            $imageMadu->move('product_review', $namaImage);
        }

        $this->ReviewModel->save([
            'image_review' => $namaImage,
            'urutan' => $this->request->getVar('urutan')
        ]);

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-review');
    }

    public function prosesUpdateReview()
    {
        if (!$this->validate([
            // 'image' => [
            //     // 'rules' => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
            //     'rules' => 'max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         // 'uploaded' => '{field} harus di upload',
            //         'max_size' => 'Gambar terlalu besar',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Yang anda pilih bukan gambar'
            //     ]
            // ],
            'urutan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                    // 'is_unique' => '{field} harus berbeda'
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'Data gagal ditambahkan');
            return redirect()->to('/admin-review')->withInput();
        }

        $id_review = $this->request->getVar('id_review');
        $urutan = $this->request->getVar('urutan');
        //ambil iimage
        $imageMadu = $this->request->getFile('image_review');
        //cek image lama di ganti atau tidak
        if ($imageMadu->getError() == 4) {
            $namaImage = $this->request->getVar('image_lama');
        } else {
            //generate random nama image
            $namaImage = $imageMadu->getRandomName();
            $imageMadu->move('product_review', $namaImage);

            //cek jika default
            $review = $this->ReviewModel->find($id_review);
            if ($review['image_review'] != 'default.jpg') {
                //hapus file lama
                unlink('product_review/' . $this->request->getVar('image_lama'));
            }
        }

        // $urutancount = $this->ReviewModel->find($urutan);
        // if ($urutancount > 0) {
        //     session()->setFlashdata('gagal', 'Data gagal ditambahkan');
        //     return redirect()->to('/admin-review')->withInput();
        // } else {
        $this->ReviewModel->save([
            'id_review' => $id_review,
            'image_review' => $namaImage,
            'urutan' => $urutan
        ]);
        session()->setFlashdata('berhasilUpdate', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-review');
        // }
    }

    public function deleteReview()
    {
        $id = $this->request->getVar('id_review');
        //cari gambar berdasarkan id
        $review = $this->ReviewModel->find($id);
        // cek jika file gambar default
        if ($review['image_review'] != 'default.jpg') {
            //hapus gambar dalam folder
            unlink('product_review/' . $review['image_review']);
        }

        $this->ReviewModel->delete($id); //menghapus data didatabase
        session()->setFlashdata('delete', 'Data Berhasil dihapus');
        return redirect()->to('/admin-review');
    }
}
