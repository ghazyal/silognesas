<?= $this->section('title') ?>
Edit User
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Edit <strong>User</strong>
    </h1>

    <div class="row">

        <div class="col-md-8 col-lg-6">

            <div class="card">

                <div class="card-body">

                    <form action="<?= base_url('users/update/'.$user['id']) ?>"
                          method="post">

                        <?= csrf_field() ?>

                        <!-- USERNAME -->

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   value="<?= esc($user['username']) ?>"
                                   required>

                        </div>


                        <!-- EMAIL -->

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="<?= esc($user['email']) ?>"
                                   required>

                        </div>


                        <!-- ROLE -->

                        <div class="mb-3">

                            <label class="form-label">
                                Role
                            </label>

                            <select name="role"
                                    class="form-select"
                                    required>

                                <option value="superadmin"
                                    <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>

                                    Super Admin

                                </option>

                                <option value="guru"
                                    <?= $user['role'] == 'guru' ? 'selected' : '' ?>>

                                    Guru

                                </option>

                                <option value="siswa"
                                    <?= $user['role'] == 'siswa' ? 'selected' : '' ?>>

                                    Siswa

                                </option>

                            </select>

                        </div>


                        <div class="d-flex gap-2">

                            <a href="<?= base_url('users') ?>"
                               class="btn btn-secondary">

                                Kembali

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>