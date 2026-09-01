<?php

namespace App\Controllers;

use App\Models\rakModel;
use App\Models\barangModel;

class Rak extends BaseController
{
    protected $rakmodel;
    protected $barangmodel;

    public function __construct()
    {
        $this->rakmodel = new rakModel();
        $this->barangmodel = new barangModel();
    }

    public function index()
    {
        $data = [

            'pageTitle' => 'Kelola Rak',

            'rak' =>
            $this->rakmodel
                ->dataRak(),

            'rakNonaktif' =>
            $this->rakmodel
                ->dataRakNonaktif()

        ];

        return view(
            'apps/rak/rak',
            $data
        );
    }

    public function tambah()
    {
        return view(
            'apps/rak/form_tambah',
            [
                'pageTitle' => 'Tambah Rak'
            ]
        );
    }

    public function simpan()
    {
        if (
            !$this->validate([
                'rak' => 'required'
            ])
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'warning',
                    'Nama rak wajib diisi'
                );
        }

        try {

            $this->rakmodel->save([

                'rak' =>
                $this->request
                    ->getPost('rak'),

                'status' => 'aktif'

            ]);

            return redirect()
                ->to('/rak')
                ->with(
                    'success',
                    'Data berhasil ditambahkan'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menambahkan data'
                );
        }
    }

    public function edit($id_rak)
    {
        $data = [

            'pageTitle' => 'Edit Rak',

            'rak' =>
            $this->rakmodel
                ->find($id_rak)

        ];

        return view(
            'apps/rak/form_edit',
            $data
        );
    }

    public function update($id_rak)
    {
        try {

            $this->rakmodel->update(
                $id_rak,
                [
                    'rak' =>
                    $this->request
                        ->getPost('rak')
                ]
            );

            return redirect()
                ->to('/rak')
                ->with(
                    'success',
                    'Data berhasil diperbarui'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Gagal update data'
                );
        }
    }

    public function delete($id_rak)
    {
        $dipakai =
            $this->barangmodel
                ->where(
                    'id_rak',
                    $id_rak
                )
                ->where(
                    'status',
                    'aktif'
                )
                ->countAllResults();

        if ($dipakai > 0) {

            return redirect()
                ->to('/rak')
                ->with(
                    'warning',
                    'Rak masih digunakan oleh barang'
                );
        }

        $rak =
            $this->rakmodel
                ->find($id_rak);

        if (!$rak) {

            return redirect()
                ->to('/rak')
                ->with(
                    'warning',
                    'Data rak tidak ditemukan'
                );
        }

        $this->rakmodel
            ->update(
                $id_rak,
                [
                    'status' => 'nonaktif'
                ]
            );

        return redirect()
            ->to('/rak')
            ->with(
                'success',
                'Rak berhasil dinonaktifkan'
            );
    }

    public function aktifkan($id_rak)
    {
        $rak =
        $this->rakmodel
            ->find($id_rak);

        if (!$rak) {

            return redirect()
                ->to('/rak')
                ->with(
                    'warning',
                    'Data rak tidak ditemukan'
                );
        }

        $this->rakmodel
            ->update(
                $id_rak,
                [
                    'status' => 'aktif'
                ]
            );

        return redirect()
            ->to('/rak')
            ->with(
                'success',
                'Rak berhasil diaktifkan kembali'
            );
    }
}