<?php

namespace App\Controllers;

use App\Models\supplierModel;

class Supplier extends BaseController
{
    protected $suppliermodel;

    public function __construct()
    {
        $this->suppliermodel =
        new supplierModel();
    }

    public function index()
    {
        $data = [

            'pageTitle' =>
            'Kelola Supplier',

            'supplier' =>
            $this->suppliermodel
                ->dataSupplier()

        ];

        return view(
            'apps/supplier/supplier',
            $data
        );
    }

    public function tambah()
    {
        $data = [

            'pageTitle' =>
            'Tambah Data Supplier'

        ];

        return view(
            'apps/supplier/form_tambah',
            $data
        );
    }

    public function simpan()
    {
        $wajib=[

            'nama_supplier'=>'required',
            'email'=>'required|valid_email',
            'alamat'=>'required',
            'no_hp'=>'required'

        ];

        if(
            !$this->validate(
                $wajib
            )
        )
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'warning',
                        'Semua data wajib diisi dengan benar'
                    );
        }

        try{

            $this->suppliermodel
                ->save([

                'nama_supplier'=>
                $this->request
                    ->getPost(
                        'nama_supplier'
                    ),

                'email'=>
                $this->request
                    ->getPost(
                        'email'
                    ),

                'alamat'=>
                $this->request
                    ->getPost(
                        'alamat'
                    ),

                'no_hp'=>
                $this->request
                    ->getPost(
                        'no_hp'
                    ),

                'status'=>
                'aktif'

            ]);

            return redirect()
                    ->to('/supplier')
                    ->with(
                        'success',
                        'Data supplier berhasil ditambahkan'
                    );

        }

        catch(\Exception $e)
        {

            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal menambahkan supplier'
                    );
        }
    }

    public function edit(
        $id_supplier
    )
    {
        $supplier=
        $this->suppliermodel
            ->data_sup(
                $id_supplier
            );

        if(
            !$supplier
        )
        {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException(
                'Data supplier tidak ditemukan'
            );
        }

        $data=[

            'pageTitle'=>
            'Edit Supplier',

            'supplier'=>
            $supplier

        ];

        return view(
            'apps/supplier/form_edit',
            $data
        );
    }

    public function update(
        $id_supplier
    )
    {
        $wajib=[

            'nama_supplier'=>'required',
            'email'=>'required|valid_email',
            'alamat'=>'required',
            'no_hp'=>'required'

        ];

        if(
            !$this->validate(
                $wajib
            )
        )
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'warning',
                        'Semua data wajib diisi dengan benar'
                    );
        }

        try{

            $this->suppliermodel
                ->update(
                    $id_supplier,
                    [

                    'nama_supplier'=>
                    $this->request
                        ->getPost(
                            'nama_supplier'
                        ),

                    'email'=>
                    $this->request
                        ->getPost(
                            'email'
                        ),

                    'alamat'=>
                    $this->request
                        ->getPost(
                            'alamat'
                        ),

                    'no_hp'=>
                    $this->request
                        ->getPost(
                            'no_hp'
                        ),

                    'status'=>
                    'aktif'

                    ]
                );

            return redirect()
                    ->to('/supplier')
                    ->with(
                        'success',
                        'Data supplier berhasil diperbarui'
                    );

        }

        catch(
            \Exception $e
        )
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Gagal memperbarui supplier'
                    );
        }
    }

    public function delete(
        $id_supplier
    )
    {
        $supplier=
        $this->suppliermodel
            ->find(
                $id_supplier
            );

        if(
            !$supplier
        )
        {
            return redirect()
                    ->to(
                        '/supplier'
                    )
                    ->with(
                        'warning',
                        'Data supplier tidak ditemukan'
                    );
        }

        $this->suppliermodel
            ->update(
                $id_supplier,
                [
                    'status'=>
                    'nonaktif'
                ]
            );

        return redirect()
                ->to(
                    '/supplier'
                )
                ->with(
                    'success',
                    'Supplier berhasil dinonaktifkan'
                );
    }
}