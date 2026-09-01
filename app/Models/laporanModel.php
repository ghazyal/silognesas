<?php

namespace App\Models;

use CodeIgniter\Model;

class laporanModel extends Model
{
    protected $table = 'transaksi';


    public function laporanTransaksi($tanggalMulai = null, $tanggalAkhir = null)
    {
        $builder = $this->select('
            transaksi.*,
            barang.nama_barang,
            supplier.nama_supplier,
            users.username
        ')
        ->join(
            'barang',
            'barang.id_barang = transaksi.id_barang'
        )
        ->join(
            'supplier',
            'supplier.id_supplier = transaksi.id_supplier',
            'left'
        )
        ->join(
            'users',
            'users.id = transaksi.id_user'
        );

        if (!empty($tanggalMulai)) {
            $builder->where(
                'transaksi.tanggal >=',
                $tanggalMulai
            );
        }

        if (!empty($tanggalAkhir)) {
            $builder->where(
                'transaksi.tanggal <=',
                $tanggalAkhir
            );
        }

        return $builder
            ->orderBy(
                'transaksi.tanggal',
                'DESC'
            )
            ->findAll();
    }


    public function laporanStok()
    {
        return $this->db
            ->table('barang')
            ->get()
            ->getResultArray();
    }
}