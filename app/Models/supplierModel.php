<?php

namespace App\Models;

use CodeIgniter\Model;

class supplierModel extends Model
{
    protected $table =
    'supplier';

    protected $primaryKey =
    'id_supplier';

    protected $allowedFields = [

        'nama_supplier',
        'email',
        'alamat',
        'no_hp',
        'status'

    ];

    public function dataSupplier()
    {
        return $this
            ->where(
                'status',
                'aktif'
            )
            ->findAll();
    }

    public function data_sup(
        $id_supplier
    )
    {
        return $this
            ->where(
                'id_supplier',
                $id_supplier
            )
            ->first();
    }

    public function updateSupplier(
        $id_supplier,
        $data
    )
    {
        return $this
            ->update(
                $id_supplier,
                $data
            );
    }

    public function hapusSupplier(
        $id_supplier
    )
    {
        return $this
            ->update(
                $id_supplier,
                [
                    'status' =>
                    'nonaktif'
                ]
            );
    }
}