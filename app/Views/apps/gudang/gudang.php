<?= $this->section('title') ?>
Kelola Gudang
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>Gudang</strong>
    </h1>

    <!-- GUDANG AKTIF -->
    <div class="row mb-4 mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <div class="row">

                        <div class="col-md-5 col-12 mb-2">

                            <a
                                href="<?= base_url('gudang/tambah') ?>"
                                class="btn btn-primary">

                                Tambah Gudang

                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <h5 class="card-title mb-3">
                        Daftar Gudang Aktif
                    </h5>

                    <div class="table-responsive">

                        <table
                            class="table table-striped table-hover datatable">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-start">
                                        Gudang
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php if (!empty($gudang)): ?>

                                <?php
                                $no = 1;

                                foreach ($gudang as $key):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($key['gudang']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a
                                            href="#"
                                            class="btn btn-warning btn-sm btn-nonaktif"

                                            data-url="<?= base_url(
                                                'gudang/delete/' .
                                                $key['id_gudang']
                                            ) ?>"

                                            data-nama="<?= esc(
                                                $key['gudang']
                                            ) ?>">

                                            <i data-feather="slash"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php endif ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- GUDANG NONAKTIF -->
    <div class="row mb-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title mb-0">
                        Daftar Gudang Nonaktif
                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table
                            class="table table-striped table-hover datatable">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-start">
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

                            <?php if (!empty($gudangNonaktif)): ?>

                                <?php
                                $no = 1;

                                foreach (
                                    $gudangNonaktif
                                    as $key
                                ):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc(
                                            $key['gudang']
                                        ) ?>
                                    </td>

                                    <td class="text-center">

                                        <span
                                            class="badge bg-secondary">

                                            Nonaktif

                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <a
                                            href="#"
                                            class="btn btn-success btn-sm btn-aktifkan"

                                            data-url="<?= base_url(
                                                'gudang/aktifkan/' .
                                                $key['id_gudang']
                                            ) ?>"

                                            data-nama="<?= esc(
                                                $key['gudang']
                                            ) ?>">

                                            <i data-feather="check"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

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

// ===============================
// NONAKTIFKAN GUDANG
// ===============================

document
.querySelectorAll('.btn-nonaktif')
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
                    'Nonaktifkan gudang?',

                html:
                    `
                    Gudang:
                    <b>${nama}</b>
                    <br><br>
                    Gudang tidak akan dihapus permanen
                    dan dapat diaktifkan kembali.
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


// ===============================
// AKTIFKAN GUDANG
// ===============================

document
.querySelectorAll('.btn-aktifkan')
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
                    'Aktifkan kembali gudang?',

                html:
                    `
                    Gudang:
                    <b>${nama}</b>
                    <br><br>
                    Gudang akan kembali tersedia
                    untuk digunakan.
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