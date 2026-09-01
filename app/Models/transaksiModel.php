<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = [
        'tanggal',
        'jenis_transaksi',
        'jumlah',
        'keterangan',
        'id_barang',
        'id_supplier',
        'id_user'
    ];

    public function dataTransaksi()
    {
        return $this->select('
                transaksi.*,
                barang.nama_barang,
                supplier.nama_supplier,
                users.username
            ')
            ->join(
                'barang',
                'barang.id_barang = transaksi.id_barang',
                'left'
            )
            ->join(
                'supplier',
                'supplier.id_supplier = transaksi.id_supplier',
                'left'
            )
            ->join(
                'users',
                'users.id = transaksi.id_user',
                'left'
            )
            ->orderBy(
                'tanggal',
                'DESC'
            )
            ->orderBy(
                'id_transaksi',
                'DESC'
            )
            ->findAll();
    }

    public function data_trans($id_transaksi)
    {
        return $this->where(
                'id_transaksi',
                $id_transaksi
            )
            ->first();
    }

    public function updatetransaksi(
        $id_transaksi,
        $data
    )
    {
        return $this->update(
            $id_transaksi,
            $data
        );
    }

    public function hapustransaksi(
        $id_transaksi
    )
    {
        return $this->delete(
            $id_transaksi
        );
    }

    // transaksi masuk minggu ini
    public function masukMingguIni()
    {
        return $this->db
            ->table('transaksi')
            ->where(
                'jenis_transaksi',
                'masuk'
            )
            ->where(
                'WEEK(tanggal)',
                date('W')
            )
            ->countAllResults();
    }

    // transaksi masuk minggu lalu
    public function masukMingguLalu()
    {
        return $this->db
            ->table('transaksi')
            ->where(
                'jenis_transaksi',
                'masuk'
            )
            ->where(
                'WEEK(tanggal)',
                date('W') - 1
            )
            ->countAllResults();
    }
}