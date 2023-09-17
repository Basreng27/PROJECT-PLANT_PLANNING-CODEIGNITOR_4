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

        $id_tanaman = $this->request->getVar('id_tanaman');
        $nama_tanaman = $this->request->getVar('nama_tanaman');
        $lama = $this->request->getVar('lama');
        $waktu = $this->request->getVar('waktu');
        $musim = $this->request->getVar('musim');
        $keterangan = $this->request->getVar('keterangan');
        $dari_bulan = $this->request->getVar('dari_bulan');
        $sampai_bulan = $this->request->getVar('sampai_bulan');

        //ambil iimage
        $imageTanaman = $this->request->getFile('image_tanaman');
        //upload gambar default jika tidak diisi
        if ($imageTanaman->getError() == 4) {
            if (!empty($imageTanaman)) {
                $namaImage = $this->request->getVar('image_tanaman_lama');
            } else {
                $namaImage = 'default.jpg';
            }
        } else {
            if (!empty($id_tanaman)) {
                if (!empty($imageTanaman)) {
                    $image_tanam = $this->TanamansModel->find($this->request->getVar('id_tanaman'));
                    if ($image_tanam['image_tanaman'] != 'default.jpg') {
                        //hapus file lama
                        unlink('tanam/' . $this->request->getVar('image_tanaman_lama'));
                    }
                    $namaImage = $imageTanaman->getRandomName();
                    $imageTanaman->move('tanam', $namaImage);
                }
            } else {
                $namaImage = $imageTanaman->getRandomName();
                $imageTanaman->move('tanam', $namaImage);
            }
        }

        if (!empty($id_tanaman)) {
            $this->TanamansModel->save([
                'id_tanaman' => $id_tanaman,
                'nama_tanaman' => $nama_tanaman,
                'image_tanaman' => $namaImage,
                'lama' => $lama,
                'waktu' => $waktu,
                'musim' => $musim,
                'keterangan' => $keterangan,
                'dari_bulan' => $dari_bulan,
                'sampai_bulan' => $sampai_bulan,
            ]);
        } else {
            $this->TanamansModel->save([
                'nama_tanaman' => $nama_tanaman,
                'image_tanaman' => $namaImage,
                'lama' => $lama,
                'waktu' => $waktu,
                'musim' => $musim,
                'keterangan' => $keterangan,
                'dari_bulan' => $dari_bulan,
                'sampai_bulan' => $sampai_bulan,
            ]);
        }

        session()->setFlashdata('berhasil', 'Data berhasil ditambahkan');
        return redirect()->to('/admin-tanaman');
    }

    public function prosesDeleteTanaman()
    {
        $id = $this->request->getVar('id_tanaman');

        //cari gambar berdasarkan id
        $tanaman = $this->TanamansModel->find($id);
        // cek jika file gambar default
        if ($tanaman['image_tanaman'] != 'default.jpg') {
            //hapus gambar dalam folder
            if (!empty($tanaman['image_tanaman'])) {
                unlink('tanam/' . $tanaman['image_tanaman']);
            }
        }

        $this->TanamansModel->delete($id); //menghapus data didatabase
        session()->setFlashdata('delete', 'Data Berhasil dihapus');
        return redirect()->to('/admin-tanaman');
    }
}
