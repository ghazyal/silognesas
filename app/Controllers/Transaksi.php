<?php

namespace App\Controllers;

use App\Models\transaksiModel;
use App\Models\barangModel;
use App\Models\supplierModel;

class Transaksi extends BaseController
{
    protected $transaksimodel;
    protected $barangmodel;
    protected $suppliermodel;

    public function __construct()
    {
        $this->transaksimodel = new transaksiModel();
        $this->barangmodel = new barangModel();
        $this->suppliermodel = new supplierModel();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kelola Transaksi',
            'transaksi' => $this->transaksimodel
                                ->dataTransaksi()
        ];

        return view(
            'apps/transaksi/transaksi',
            $data
        );
    }

    public function tambah()
    {
        $data = [
            'pageTitle' => 'Tambah Transaksi',
            'barang' => $this->barangmodel->findAll(),
            'supplier' => $this->suppliermodel->findAll()
        ];

        return view(
            'apps/transaksi/form_tambah',
            $data
        );
    }

    public function getSupplier($id_barang)
    {
        $barang =
        $this->barangmodel
            ->select(
                'barang.id_supplier,
                supplier.nama_supplier'
            )
            ->join(
                'supplier',
                'supplier.id_supplier = barang.id_supplier'
            )
            ->where(
                'barang.id_barang',
                $id_barang
            )
            ->first();

        return $this->response
                ->setJSON(
                    $barang
                );
    }

    public function simpan()
    {
        $idBarang = $this->request
                        ->getPost('id_barang');

        $jumlah = $this->request
                        ->getPost('jumlah');

        $jenis = $this->request
                        ->getPost('jenis_transaksi');

        $barang = $this->barangmodel
                        ->find($idBarang);

        // transaksi masuk
        if($jenis == 'masuk')
        {
            $stokBaru =
                $barang['stok']
                + $jumlah;
        }

        // transaksi keluar
        else
        {
            if(
                $barang['stok']
                < $jumlah
            )
            {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Stok tidak mencukupi'
                    );
            }

            $stokBaru =
                $barang['stok']
                - $jumlah;
        }

        // simpan transaksi
        $this->transaksimodel->save([

            'tanggal' =>
                $this->request
                ->getPost('tanggal'),

            'jenis_transaksi' =>
                $jenis,

            'jumlah' =>
                $jumlah,

            'keterangan' =>
                $this->request
                ->getPost('keterangan'),

            'id_barang' =>
                $idBarang,

            'id_supplier' =>
                $jenis == 'masuk'
                ? $this->request
                        ->getPost('id_supplier')
                : null,

            'id_user' =>
                user()->id
        ]);

        // update stok barang
        $this->barangmodel->update(
            $idBarang,
            [
                'stok' => $stokBaru
            ]
        );

        return redirect()
                ->to('/transaksi')
                ->with(
                    'success',
                    'Transaksi berhasil ditambahkan'
                );
    }

    public function koreksi($id)
    {
        $data = [
            'pageTitle'=>'Koreksi Transaksi',
            'transaksi' => $this->transaksimodel
                                ->data_trans($id),
            'barang' => $this->barangmodel
                            ->findAll(),
            'supplier' => $this->suppliermodel
                                ->findAll()
        ];

        return view(
            'apps/transaksi/form_koreksi',
            $data
        );
    }

    public function update($id)
    {
        $transaksiLama =
            $this->transaksimodel
                ->find($id);

        $barang =
            $this->barangmodel
                ->find(
                    $transaksiLama['id_barang']
                );

        // balikin stok lama
        if(
            $transaksiLama['jenis_transaksi']
            == 'masuk'
        )
        {
            $stok =
            $barang['stok']
            - $transaksiLama['jumlah'];
        }
        else
        {
            $stok =
            $barang['stok']
            + $transaksiLama['jumlah'];
        }

        // terapkan transaksi baru
        $jumlahBaru =
            $this->request
                ->getPost('jumlah');

        $jenisBaru =
            $this->request
                ->getPost(
                    'jenis_transaksi'
                );

        if(
            $jenisBaru
            == 'masuk'
        )
        {
            $stok += $jumlahBaru;
        }
        else
        {
            if(
                $stok < $jumlahBaru
            )
            {
                return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Stok tidak cukup'
                        );
            }

            $stok -= $jumlahBaru;
        }

        $this->barangmodel
            ->update(
                $barang['id_barang'],
                [
                    'stok'=>$stok
                ]
            );

        $this->transaksimodel
            ->update(
                $id,
                [
                    'tanggal'=>$this->request->getPost('tanggal'),
                    'jenis_transaksi'=>$jenisBaru,
                    'jumlah'=>$jumlahBaru,
                    'keterangan'=>$this->request->getPost('keterangan')
                ]
            );

        return redirect()
            ->to('/transaksi')
            ->with(
                'success',
                'Transaksi berhasil dikoreksi'
            );
    }
}