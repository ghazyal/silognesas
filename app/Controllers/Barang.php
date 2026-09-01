<?php

namespace App\Controllers;

use App\Models\barangModel;
use App\Models\supplierModel;
use App\Models\rakModel;
use App\Models\gudangModel;

class Barang extends BaseController
{
    protected $barangmodel;
    protected $suppliermodel;
    protected $rakmodel;
    protected $gudangmodel;

    public function __construct()
    {
        $this->barangmodel = new barangModel();
        $this->suppliermodel = new supplierModel();
        $this->rakmodel = new rakModel();
        $this->gudangmodel = new gudangModel();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kelola Barang',

            'barang' =>
                $this->barangmodel
                    ->dataBarang(),

            'barangNonaktif' =>
                $this->barangmodel
                    ->dataBarangNonaktif()
        ];

        return view(
            'apps/barang/barang',
            $data
        );
    }

    public function tambah()
    {
        $data = [
            'pageTitle' => 'Tambah Data Barang',
            'supplier' => $this->suppliermodel->findAll(),
            'rak' => $this->rakmodel->dataRak(),
            'gudang' => $this->gudangmodel->dataGudang()
        ];

        return view(
            'apps/barang/form_tambah',
            $data
        );
    }

    public function simpan()
    {
        $wajib = [
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_barang' => 'required',
            'id_supplier' => 'required',
            'id_rak' => 'required',
            'id_gudang' => 'required',
        ];


        if (!$this->validate($wajib)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'warning',
                    'Semua data wajib diisi'
                );
        }


        try {

            $this->barangmodel->save([

                'nama_barang' =>
                    $this->request->getPost('nama_barang'),

                // Stok awal selalu 0
                'stok' => 0,

                'satuan' =>
                    $this->request->getPost('satuan'),

                'harga_barang' =>
                    $this->request->getPost('harga_barang'),

                'id_supplier' =>
                    $this->request->getPost('id_supplier'),

                'id_rak' =>
                    $this->request->getPost('id_rak'),

                'id_gudang' =>
                    $this->request->getPost('id_gudang'),

                'status' =>
                    'aktif'

            ]);


            return redirect()->to('/barang')
                ->with(
                    'success',
                    'Data barang berhasil ditambahkan'
                );


        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal menambahkan data barang'
                );
        }
    }

    public function edit($id_barang)
    {
        $barang =
            $this->barangmodel
                ->data_bar($id_barang);

        if (!$barang) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                'Data barang tidak ditemukan'
            );
        }

        $data = [
            'pageTitle' => 'Edit Barang',
            'barang' => $barang,
            'supplier' => $this->suppliermodel->findAll(),
            'rak' => $this->rakmodel->dataRak(),
            'gudang' => $this->gudangmodel->dataGudang()
        ];

        return view(
            'apps/barang/form_edit',
            $data
        );
    }

    public function update($id_barang)
    {
        $wajib = [
            'nama_barang' => 'required',
            'satuan' => 'required',
            'harga_barang' => 'required',
            'id_supplier' => 'required',
            'id_rak' => 'required',
            'id_gudang' => 'required',
        ];


        if (!$this->validate($wajib)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'warning',
                    'Semua data wajib diisi'
                );
        }


        try {

            $this->barangmodel->update(
                $id_barang,
                [

                    'nama_barang' =>
                        $this->request->getPost('nama_barang'),

                    'satuan' =>
                        $this->request->getPost('satuan'),

                    'harga_barang' =>
                        $this->request->getPost('harga_barang'),

                    'id_supplier' =>
                        $this->request->getPost('id_supplier'),

                    'id_rak' =>
                        $this->request->getPost('id_rak'),

                    'id_gudang' =>
                        $this->request->getPost('id_gudang')

                ]
            );


            return redirect()->to('/barang')
                ->with(
                    'success',
                    'Data barang berhasil diperbarui'
                );


        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Gagal memperbarui data barang'
                );
        }
    }

    public function delete($id_barang)
    {
        $barang =
            $this->barangmodel
                ->find($id_barang);

        if (!$barang) {

            return redirect()
                ->to('/barang')
                ->with(
                    'warning',
                    'Data barang tidak ditemukan'
                );
        }

        $this->barangmodel
            ->update(
                $id_barang,
                [
                    'status' => 'nonaktif'
                ]
            );

        return redirect()
            ->to('/barang')
            ->with(
                'success',
                'Barang berhasil dinonaktifkan'
            );
    }

    public function aktifkan($id_barang)
    {
        $barang =
            $this->barangmodel
                ->find($id_barang);

        if (!$barang) {

            return redirect()
                ->to('/barang')
                ->with(
                    'warning',
                    'Data barang tidak ditemukan'
                );
        }

        $this->barangmodel
            ->update(
                $id_barang,
                [
                    'status' => 'aktif'
                ]
            );

        return redirect()
            ->to('/barang')
            ->with(
                'success',
                'Barang berhasil diaktifkan kembali'
            );
    }
}