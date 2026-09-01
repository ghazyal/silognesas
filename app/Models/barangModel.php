<?php

namespace App\Models;

use CodeIgniter\Model;

class barangModel extends Model
{
    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    protected $allowedFields = [
        'nama_barang',
        'stok',
        'satuan',
        'harga_barang',
        'status',
        'id_supplier',
        'id_rak',
        'id_gudang'
    ];

    public function dataBarang()
    {
        return $this->select('
                barang.*,
                supplier.nama_supplier,
                rak.rak,
                gudang.gudang
            ')
            ->join(
                'supplier',
                'supplier.id_supplier = barang.id_supplier'
            )
            ->join(
                'rak',
                'rak.id_rak = barang.id_rak'
            )
            ->join(
                'gudang',
                'gudang.id_gudang = barang.id_gudang'
            )
            ->where(
                'barang.status',
                'aktif'
            )
            ->findAll();
    }

    public function dataBarangNonaktif()
    {
        return $this->select('
                barang.*,
                supplier.nama_supplier,
                rak.rak,
                gudang.gudang
            ')
            ->join(
                'supplier',
                'supplier.id_supplier = barang.id_supplier'
            )
            ->join(
                'rak',
                'rak.id_rak = barang.id_rak'
            )
            ->join(
                'gudang',
                'gudang.id_gudang = barang.id_gudang'
            )
            ->where(
                'barang.status',
                'nonaktif'
            )
            ->findAll();
    }

    public function data_bar($id_barang)
    {
        return $this->select('
                barang.*,
                supplier.nama_supplier,
                rak.rak,
                gudang.gudang
            ')
            ->join(
                'supplier',
                'supplier.id_supplier = barang.id_supplier'
            )
            ->join(
                'rak',
                'rak.id_rak = barang.id_rak'
            )
            ->join(
                'gudang',
                'gudang.id_gudang = barang.id_gudang'
            )
            ->where(
                'barang.id_barang',
                $id_barang
            )
            ->first();
    }

    public function updatebarang(
        $id_barang,
        $data
    )
    {
        return $this->update(
            $id_barang,
            $data
        );
    }

    public function hapusbarang($id_barang)
    {
        return $this->update(
            $id_barang,
            [
                'status' => 'nonaktif'
            ]
        );
    }
}