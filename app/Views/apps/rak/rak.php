<?= $this->section('title') ?>
Kelola Rak
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>Rak</strong>
    </h1>


    <!-- ========================= -->
    <!-- RAK AKTIF -->
    <!-- ========================= -->

    <div class="row mb-4 mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <div class="row">

                        <div class="col-md-5 col-12 mb-2">

                            <a href="<?= base_url('rak/tambah') ?>"
                               class="btn btn-primary">

                                Tambah Rak

                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <h5 class="mb-3">
                        Rak Aktif
                    </h5>

                    <div class="table-responsive">

                        <table class="table table-striped table-hover <?= !empty($rak) ? 'datatable' : '' ?>">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-start">
                                        Rak
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php if (!empty($rak)): ?>

                                <?php
                                $no = 1;

                                foreach ($rak as $key):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($key['rak']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="#"
                                           class="btn btn-warning btn-sm btn-nonaktif"

                                           data-url="<?= base_url('rak/delete/'.$key['id_rak']) ?>"

                                           data-nama="<?= esc($key['rak']) ?>">

                                            <i data-feather="slash"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="3"
                                        class="text-center">

                                        Tidak Ada Data Rak Aktif.

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
    <!-- RAK NONAKTIF -->
    <!-- ========================= -->

    <div class="row mb-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h5 class="card-title mb-0">
                        Rak Nonaktif
                    </h5>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover <?= !empty($rakNonaktif) ? 'datatable' : '' ?>">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-start">
                                        Rak
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

                            <?php if (!empty($rakNonaktif)): ?>

                                <?php
                                $no = 1;

                                foreach ($rakNonaktif as $key):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($key['rak']) ?>
                                    </td>

                                    <td class="text-center">

                                        <span class="badge bg-secondary">
                                            Nonaktif
                                        </span>

                                    </td>

                                    <td class="text-center">

                                        <a href="#"
                                           class="btn btn-success btn-sm btn-aktifkan"

                                           data-url="<?= base_url('rak/aktifkan/'.$key['id_rak']) ?>"

                                           data-nama="<?= esc($key['rak']) ?>">

                                            <i data-feather="check"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="4"
                                        class="text-center">

                                        Tidak Ada Rak Nonaktif.

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


// =========================
// NONAKTIFKAN RAK
// =========================

document
.querySelectorAll('.btn-nonaktif')
.forEach(function(btn) {

    btn.addEventListener(
        'click',
        function(e) {

            e.preventDefault();

            let url =
                this.dataset.url;

            let nama =
                this.dataset.nama;

            Swal.fire({

                title:
                    'Nonaktifkan rak?',

                html:
                    `
                    Rak:
                    <b>${nama}</b>
                    <br><br>
                    Rak tidak akan dihapus permanen.
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
            .then((result) => {

                if (result.isConfirmed) {

                    window.location =
                        url;

                }

            });

        }
    );

});


// =========================
// AKTIFKAN KEMBALI
// =========================

document
.querySelectorAll('.btn-aktifkan')
.forEach(function(btn) {

    btn.addEventListener(
        'click',
        function(e) {

            e.preventDefault();

            let url =
                this.dataset.url;

            let nama =
                this.dataset.nama;

            Swal.fire({

                title:
                    'Aktifkan kembali rak?',

                html:
                    `
                    Rak:
                    <b>${nama}</b>
                    <br><br>
                    Rak akan kembali tersedia
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
            .then((result) => {

                if (result.isConfirmed) {

                    window.location =
                        url;

                }

            });

        }
    );

});

</script>

<?= $this->endSection() ?>