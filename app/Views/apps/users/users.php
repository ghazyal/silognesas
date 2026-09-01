<?= $this->section('title') ?>
Kelola User
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>User</strong>
    </h1>

    <div class="row mb-4 mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <div class="row">

                        <div class="col-md-5 col-12 mb-2">

                            <a href="<?= base_url('users/tambah') ?>"
                               class="btn btn-primary">

                                Tambah User

                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <?php

                    $roles = [
                        'superadmin' => 'Super Admin',
                        'guru'       => 'Guru',
                        'siswa'      => 'Siswa'
                    ];

                    foreach($roles as $keyRole => $namaRole):

                        /*
                         * Cek apakah role ini memiliki user
                         */
                        $ada = false;

                        foreach($users as $u):

                            if($u['role'] == $keyRole)
                            {
                                $ada = true;
                                break;
                            }

                        endforeach;

                    ?>

                    <h4 class="mt-3 mb-3">
                        <?= $namaRole ?>
                    </h4>

                    <div class="table-responsive mb-5">

                        <table class="table table-striped table-hover datatable">

                            <thead>

                                <tr>

                                    <th class="text-center" width="5%">
                                        No
                                    </th>

                                    <th>
                                        Username
                                    </th>

                                    <th>
                                        Email
                                    </th>

                                    <th class="text-center" width="20%">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php

                            $no = 1;

                            foreach($users as $u):

                                if($u['role'] != $keyRole)
                                {
                                    continue;
                                }

                            ?>

                            <tr>

                                <td class="text-center">
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <?= esc($u['username']) ?>
                                </td>

                                <td>
                                    <?= esc($u['email']) ?>
                                </td>

                                <td class="text-center">

                                    <!-- EDIT -->
                                    <a href="<?= base_url('users/edit/'.$u['id']) ?>"
                                       class="btn btn-success btn-sm"
                                       title="Edit User">

                                        <i data-feather="edit"></i>

                                    </a>


                                    <!-- RESET PASSWORD -->
                                    <a href="#"
                                       class="btn btn-warning btn-sm btn-reset"
                                       data-url="<?= base_url('users/reset/'.$u['id']) ?>"
                                       title="Reset Password">

                                        <i data-feather="key"></i>

                                    </a>


                                    <!-- HAPUS -->
                                    <a href="#"
                                       class="btn btn-danger btn-sm btn-hapus"
                                       data-url="<?= base_url('users/delete/'.$u['id']) ?>"
                                       title="Hapus User">

                                        <i data-feather="trash-2"></i>

                                    </a>

                                </td>

                            </tr>

                            <?php endforeach; ?>

                            </tbody>

                        </table>

                    </div>

                    <?php if(!$ada): ?>

                    <div class="text-center text-muted mb-4">

                        Tidak ada user <?= $namaRole ?>.

                    </div>

                    <?php endif; ?>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

/* =================================================
   HAPUS USER
================================================= */

document
.querySelectorAll('.btn-hapus')
.forEach(function(btn){

    btn.addEventListener(
        'click',
        function(e){

            e.preventDefault();

            let url =
                this.dataset.url;

            Swal.fire({

                title:
                    'Yakin ingin menghapus?',

                text:
                    'User yang dihapus tidak dapat dikembalikan',

                icon:
                    'warning',

                showCancelButton:
                    true,

                confirmButtonColor:
                    '#dc3545',

                cancelButtonColor:
                    '#6c757d',

                confirmButtonText:
                    'Ya, hapus',

                cancelButtonText:
                    'Tidak'

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


/* =================================================
   RESET PASSWORD
================================================= */

document
.querySelectorAll('.btn-reset')
.forEach(function(btn){

    btn.addEventListener(
        'click',
        function(e){

            e.preventDefault();

            let url =
                this.dataset.url;

            Swal.fire({

                title:
                    'Reset Password?',

                text:
                    'Password akan direset menjadi 12345678',

                icon:
                    'question',

                showCancelButton:
                    true,

                confirmButtonColor:
                    '#f59e0b',

                cancelButtonColor:
                    '#6c757d',

                confirmButtonText:
                    'Ya, reset',

                cancelButtonText:
                    'Tidak'

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