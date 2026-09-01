<?php

namespace App\Controllers;

use App\Models\gudangModel;
use App\Models\barangModel;

class Gudang extends BaseController
{
    protected $gudangmodel;
    protected $barangmodel;

    public function __construct()
    {
        $this->gudangmodel = new gudangModel();
        $this->barangmodel = new barangModel();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kelola Gudang',

            'gudang' =>
                $this->gudangmodel
                    ->dataGudang(),

            'gudangNonaktif' =>
                $this->gudangmodel
                    ->dataGudangNonaktif()
        ];

        return view(
            'apps/gudang/gudang',
            $data
        );
    }

    public function tambah()
    {
        return view(
            'apps/gudang/form_tambah',
            [
                'pageTitle' => 'Tambah Gudang'
            ]
        );
    }

    public function simpan()
    {
        if (
            !$this->validate([
                'gudang' => 'required'
            ])
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'warning',
                    'Nama gudang wajib diisi'
                );
        }

        try {

            $this->gudangmodel->save([

                'gudang' =>
                    'Gudang ' .
                    $this->request
                        ->getPost('gudang'),

                'status' => 'aktif'

            ]);

            return redirect()
                ->to('/gudang')
                ->with(
                    'success',
                    'Data gudang berhasil ditambahkan'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menambahkan data gudang'
                );
        }
    }

    public function edit($id_gudang)
    {
        $data = [

            'pageTitle' => 'Edit Gudang',

            'gudang' =>
                $this->gudangmodel
                    ->find($id_gudang)

        ];

        return view(
            'apps/gudang/form_edit',
            $data
        );
    }

    public function update($id_gudang)
    {
        try {

            $this->gudangmodel->update(
                $id_gudang,
                [
                    'gudang' =>
                        $this->request
                            ->getPost('gudang')
                ]
            );

            return redirect()
                ->to('/gudang')
                ->with(
                    'success',
                    'Data gudang berhasil diperbarui'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Gagal memperbarui data gudang'
                );
        }
    }

    // NONAKTIFKAN GUDANG
    public function delete($id_gudang)
    {
        $gudang =
            $this->gudangmodel
                ->find($id_gudang);

        if (!$gudang) {

            return redirect()
                ->to('/gudang')
                ->with(
                    'warning',
                    'Data gudang tidak ditemukan'
                );
        }

        /*
         * Cek apakah gudang masih digunakan
         * oleh barang yang aktif
         */
        $dipakai =
            $this->barangmodel
                ->where(
                    'id_gudang',
                    $id_gudang
                )
                ->where(
                    'status',
                    'aktif'
                )
                ->countAllResults();

        if ($dipakai > 0) {

            return redirect()
                ->to('/gudang')
                ->with(
                    'warning',
                    'Gudang masih digunakan oleh barang aktif'
                );
        }

        $this->gudangmodel
            ->update(
                $id_gudang,
                [
                    'status' => 'nonaktif'
                ]
            );

        return redirect()
            ->to('/gudang')
            ->with(
                'success',
                'Gudang berhasil dinonaktifkan'
            );
    }

    // AKTIFKAN KEMBALI GUDANG
    public function aktifkan($id_gudang)
    {
        $gudang =
            $this->gudangmodel
                ->find($id_gudang);

        if (!$gudang) {

            return redirect()
                ->to('/gudang')
                ->with(
                    'warning',
                    'Data gudang tidak ditemukan'
                );
        }

        $this->gudangmodel
            ->update(
                $id_gudang,
                [
                    'status' => 'aktif'
                ]
            );

        return redirect()
            ->to('/gudang')
            ->with(
                'success',
                'Gudang berhasil diaktifkan kembali'
            );
    }
}