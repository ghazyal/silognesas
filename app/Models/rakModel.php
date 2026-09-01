<?php

namespace App\Models;

use CodeIgniter\Model;

class rakModel extends Model
{
    protected $table = 'rak';

    protected $primaryKey = 'id_rak';

    protected $allowedFields = [

        'rak',
        'status'

    ];

    public function dataRak()
    {
        return $this
            ->where(
                'status',
                'aktif'
            )
            ->findAll();
    }

    public function dataRakNonaktif()
    {
        return $this
            ->where(
                'status',
                'nonaktif'
            )
            ->findAll();
    }

    public function hapusRak($id_rak)
    {
        return $this
            ->update(
                $id_rak,
                [
                    'status' => 'nonaktif'
                ]
            );
    }

    public function aktifkanRak($id_rak)
    {
        return $this
            ->update(
                $id_rak,
                [
                    'status' => 'aktif'
                ]
            );
    }
}