<?php

namespace App\Models;

use CodeIgniter\Model;

class dashboardModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Total Barang Aktif
    public function totalBarang()
    {
        return $this->db
            ->table('barang')
            ->where('status', 'aktif')
            ->countAllResults();
    }

    // Total Stok Barang Aktif
    public function totalStok()
    {
        return $this->db
            ->table('barang')
            ->selectSum('stok')
            ->where('status', 'aktif')
            ->get()
            ->getRow()
            ->stok ?? 0;
    }

    // Total Seluruh Transaksi Masuk
    public function transaksiMasuk()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'masuk')
            ->countAllResults();
    }

    // Total Seluruh Transaksi Keluar
    public function transaksiKeluar()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'keluar')
            ->countAllResults();
    }

    // Barang Aktif per Gudang
    public function barangGudang()
    {
        return $this->db
            ->table('barang')
            ->select('
                gudang.gudang,
                COUNT(barang.id_barang) as total
            ')
            ->join(
                'gudang',
                'gudang.id_gudang = barang.id_gudang'
            )
            ->where('barang.status', 'aktif')
            ->groupBy('barang.id_gudang')
            ->get()
            ->getResultArray();
    }

    // ==========================
    // TRANSAKSI HARI INI
    // ==========================

    public function masukHariIni()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'masuk')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->countAllResults();
    }

    public function masukKemarin()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'masuk')
            ->where(
                'DATE(tanggal)',
                date('Y-m-d', strtotime('-1 day'))
            )
            ->countAllResults();
    }

    public function keluarHariIni()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'keluar')
            ->where('DATE(tanggal)', date('Y-m-d'))
            ->countAllResults();
    }

    public function keluarKemarin()
    {
        return $this->db
            ->table('transaksi')
            ->where('jenis_transaksi', 'keluar')
            ->where(
                'DATE(tanggal)',
                date('Y-m-d', strtotime('-1 day'))
            )
            ->countAllResults();
    }

    // ==========================
    // GRAFIK 7 HARI TERAKHIR
    // ==========================

    public function grafikMingguan()
    {
        $hasil = [];

        for ($i = 6; $i >= 0; $i--) {

            $tanggal = date(
                'Y-m-d',
                strtotime("-{$i} day")
            );

            $masuk = $this->db
                ->table('transaksi')
                ->where('jenis_transaksi', 'masuk')
                ->where('DATE(tanggal)', $tanggal)
                ->countAllResults();

            $keluar = $this->db
                ->table('transaksi')
                ->where('jenis_transaksi', 'keluar')
                ->where('DATE(tanggal)', $tanggal)
                ->countAllResults();

            $hasil[] = [

                'tanggal' => $tanggal,

                'masuk' => $masuk,

                'keluar' => $keluar

            ];
        }

        return $hasil;
    }

    // ==========================
    // HITUNG PERSENTASE
    // ==========================

    public function persentase(
        $sekarang,
        $sebelumnya
    )
    {
        if (
            $sekarang == 0 &&
            $sebelumnya == 0
        ) {
            return 0;
        }

        if ($sebelumnya == 0) {
            return 100;
        }

        return round(
            (
                ($sekarang - $sebelumnya)
                /
                $sebelumnya
            ) * 100,
            2
        );
    }
}