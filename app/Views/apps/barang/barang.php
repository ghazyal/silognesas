<?= $this->section('title') ?>
Kelola Barang
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>Barang</strong>
    </h1>


    <!-- ========================= -->
    <!-- BARANG AKTIF -->
    <!-- ========================= -->

    <div class="row mb-4 mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <div class="row">

                        <div class="col-md-5 col-12 mb-2">

                            <a href="<?= base_url('barang/tambah') ?>"
                               class="btn btn-primary">

                                Tambah Data Barang

                            </a>

                        </div>

                    </div>

                </div>


                <div class="card-body">

                    <h5 class="card-title mb-3">
                        Barang Aktif
                    </h5>

                    <div class="table-responsive">

                        <table class="table table-striped table-hover <?= !empty($barang) ? 'datatable' : '' ?>">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-center">
                                        Nama Barang
                                    </th>

                                    <th class="text-center">
                                        Stok
                                    </th>

                                    <th class="text-center">
                                        Satuan
                                    </th>

                                    <th class="text-center">
                                        Harga
                                    </th>

                                    <th class="text-center">
                                        Supplier
                                    </th>

                                    <th class="text-center">
                                        Rak
                                    </th>

                                    <th class="text-center">
                                        Gudang
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            <?php if (!empty($barang)): ?>

                                <?php
                                $no = 1;

                                foreach ($barang as $n):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td>
                                        <?= esc($n['nama_barang']) ?>
                                    </td>

                                    <td class="text-center">
                                        <?= esc($n['stok']) ?>
                                    </td>

                                    <td class="text-center">
                                        <?= esc($n['satuan']) ?>
                                    </td>

                                    <td>
                                        <?= rupiah($n['harga_barang']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['nama_supplier']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['rak']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['gudang']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="<?= base_url('barang/edit/'.$n['id_barang']) ?>"
                                           class="btn btn-success btn-sm">

                                            <i data-feather="edit"></i>

                                        </a>


                                        <a href="#"
                                           class="btn btn-warning btn-sm btn-nonaktif"

                                           data-url="<?= base_url('barang/delete/'.$n['id_barang']) ?>"

                                           data-nama="<?= esc($n['nama_barang']) ?>">

                                            <i data-feather="slash"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="9"
                                        class="text-center">

                                        Tidak ada data barang aktif

                                    </td>

                                </tr>

                            <?php endif ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- ========================= -->
    <!-- BARANG NONAKTIF -->
    <!-- ========================= -->

    <div class="row mb-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <h5 class="card-title">
                        Barang Nonaktif
                    </h5>

                    <p class="text-muted mb-3">

                        Daftar barang yang telah dinonaktifkan
                        dan masih dapat diaktifkan kembali.

                    </p>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover <?= !empty($barangNonaktif) ? 'datatable' : '' ?>">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-center">
                                        Nama Barang
                                    </th>

                                    <th class="text-center">
                                        Stok
                                    </th>

                                    <th class="text-center">
                                        Satuan
                                    </th>

                                    <th class="text-center">
                                        Harga
                                    </th>

                                    <th class="text-center">
                                        Supplier
                                    </th>

                                    <th class="text-center">
                                        Rak
                                    </th>

                                    <th class="text-center">
                                        Gudang
                                    </th>

                                    <th class="text-center">
                                        Status
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            <?php if (!empty($barangNonaktif)): ?>

                                <?php
                                $no = 1;

                                foreach ($barangNonaktif as $n):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td>
                                        <?= esc($n['nama_barang']) ?>
                                    </td>

                                    <td class="text-center">
                                        <?= esc($n['stok']) ?>
                                    </td>

                                    <td class="text-center">
                                        <?= esc($n['satuan']) ?>
                                    </td>

                                    <td>
                                        <?= rupiah($n['harga_barang']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['nama_supplier']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['rak']) ?>
                                    </td>

                                    <td>
                                        <?= esc($n['gudang']) ?>
                                    </td>

                                    <td class="text-center">

                                        <span class="badge bg-secondary">
                                            Nonaktif
                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <a href="#"
                                           class="btn btn-success btn-sm btn-aktifkan"

                                           data-url="<?= base_url('barang/aktifkan/'.$n['id_barang']) ?>"

                                           data-nama="<?= esc($n['nama_barang']) ?>">

                                            <i data-feather="check-circle"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="10"
                                        class="text-center">

                                        Tidak ada data barang nonaktif

                                    </td>

                                </tr>

                            <?php endif ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>


/* =========================
   NONAKTIFKAN BARANG
========================= */

document
.querySelectorAll(
    '.btn-nonaktif'
)
.forEach(function(btn){

    btn.addEventListener(
        'click',
        function(e){

            e.preventDefault();

            let url =
                this.dataset.url;

            let nama =
                this.dataset.nama;


            Swal.fire({

                title:
                    'Nonaktifkan barang?',

                html:
                    `
                    Barang:
                    <b>${nama}</b>

                    <br><br>

                    Barang tidak akan dihapus permanen
                    dan masih dapat diaktifkan kembali.
                    `,

                icon:
                    'warning',

                showCancelButton:
                    true,

                confirmButtonColor:
                    '#f59e0b',

                cancelButtonColor:
                    '#6c757d',

                confirmButtonText:
                    'Ya, nonaktifkan',

                cancelButtonText:
                    'Batal'

            })
            .then((result)=>{

                if(result.isConfirmed){

                    window.location =
                        url;

                }

            });

        }
    );

});



/* =========================
   AKTIFKAN KEMBALI
========================= */

document
.querySelectorAll(
    '.btn-aktifkan'
)
.forEach(function(btn){

    btn.addEventListener(
        'click',
        function(e){

            e.preventDefault();

            let url =
                this.dataset.url;

            let nama =
                this.dataset.nama;


            Swal.fire({

                title:
                    'Aktifkan kembali barang?',

                html:
                    `
                    Barang:
                    <b>${nama}</b>

                    <br><br>

                    Barang akan kembali
                    ke dalam daftar barang aktif.
                    `,

                icon:
                    'question',

                showCancelButton:
                    true,

                confirmButtonColor:
                    '#198754',

                cancelButtonColor:
                    '#6c757d',

                confirmButtonText:
                    'Ya, aktifkan',

                cancelButtonText:
                    'Batal'

            })
            .then((result)=>{

                if(result.isConfirmed){

                    window.location =
                        url;

                }

            });

        }
    );

});

</script>


<?= $this->endSection() ?>