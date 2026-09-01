<?php

namespace App\Models;

use CodeIgniter\Model;

class gudangModel extends Model
{
    protected $table = 'gudang';

    protected $primaryKey = 'id_gudang';

    protected $allowedFields = [
        'gudang',
        'status'
    ];

    // DATA GUDANG AKTIF
    public function dataGudang()
    {
        return $this
            ->where(
                'status',
                'aktif'
            )
            ->findAll();
    }

    // DATA GUDANG NONAKTIF
    public function dataGudangNonaktif()
    {
        return $this
            ->where(
                'status',
                'nonaktif'
            )
            ->findAll();
    }

    // NONAKTIFKAN GUDANG
    public function hapusGudang($id_gudang)
    {
        return $this
            ->update(
                $id_gudang,
                [
                    'status' => 'nonaktif'
                ]
            );
    }

    // AKTIFKAN GUDANG
    public function aktifkanGudang($id_gudang)
    {
        return $this
            ->update(
                $id_gudang,
                [
                    'status' => 'aktif'
                ]
            );
    }
}