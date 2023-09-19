<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanamans_model extends Model
{
    protected $table = 'tanamans';
    protected $primaryKey = 'id_tanaman';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_tanaman', 'image_tanaman', 'lama', 'waktu', 'musim', 'keterangan', 'dari_bulan', 'sampai_bulan'];

    public function tanamanXartikelXbudidaya()
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('artikels', 'artikels.id_tanaman = tanamans.id_tanaman', 'left');
        $this->join('budidayas', 'budidayas.id_tanaman = tanamans.id_tanaman', 'left');

        return $this->findAll();
    }

    public function tanamanXartikel($id_tanaman)
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('artikels', 'artikels.id_tanaman = tanamans.id_tanaman', 'left');
        $this->where(['tanamans.id_tanaman' => $id_tanaman]);

        return $this->findAll();
    }

    public function tanamanXbudidaya($id_tanaman)
    {
        $this->select('*, tanamans.id_tanaman as id_tanaman_tanaman');
        $this->join('budidayas', 'budidayas.id_tanaman = tanamans.id_tanaman', 'left');
        $this->where(['tanamans.id_tanaman' => $id_tanaman]);

        return $this->findAll();
    }

    public function rekomendasiTanaman($plus_month = null)
    {
        $month_now = date('m');
        $plus_month ? $month_now = $month_now + $plus_month : $month_now = $month_now;

        switch ($month_now) {
            case "01":
                $bulan = "Januari";
                break;
            case "02":
                $bulan = "Februari";
                break;
            case "03":
                $bulan = "Maret";
                break;
            case "04":
                $bulan = "April";
                break;
            case "05":
                $bulan = "Mei";
                break;
            case "06":
                $bulan = "Juni";
                break;
            case "07":
                $bulan = "Juli";
                break;
            case "08":
                $bulan = "Agustus";
                break;
            case "09":
                $bulan = "September";
                break;
            case "10":
                $bulan = "Oktober";
                break;
            case "11":
                $bulan = "November";
                break;
            case "12":
                $bulan = "Desember";
                break;

            default:
                $bulan = "";
                break;
        }

        $this->where(['LOWER(dari_bulan)' => $bulan]);
        $this->orWhere(['LOWER(sampai_bulan)' => $bulan]);

        return $this->findAll();
    }
}
