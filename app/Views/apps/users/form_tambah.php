<?= $this->section('title') ?>
Tambah User
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>

<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Tambah <strong>User</strong>
    </h1>

    <div class="card mt-3">
        <div class="card-body">

            <form method="post"
                  action="<?= base_url('users/simpan') ?>"
                  class="row g-2">

                <?= csrf_field() ?>

                <div class="col-6">
                    <label class="form-label">
                        Username
                    </label>

                    <input class="form-control"
                           type="text"
                           name="username"
                           required>
                </div>

                <div class="col-6">
                    <label class="form-label">
                        Email
                    </label>

                    <input class="form-control"
                           type="email"
                           name="email"
                           required>
                </div>

                <div class="col-6">
                    <label class="form-label">
                        Password
                    </label>

                    <input class="form-control"
                           type="password"
                           name="password"
                           required>
                </div>

                <div class="col-6">
                    <label class="form-label">
                        Role
                    </label>

                    <select class="form-select"
                            name="role"
                            required>

                        <option value="">
                            == Pilih Role ==
                        </option>

                        <?php foreach($groups as $g): ?>

                            <option value="<?= $g['id'] ?>">
                                <?= $g['name'] ?>
                            </option>

                        <?php endforeach ?>

                    </select>

                </div>

                <div class="col-12">

                    <button class="btn btn-success text-white"
                            type="submit">

                        Tambah
                    </button>

                    <a class="btn btn-danger text-white"
                       href="<?= base_url('users') ?>">

                        Kembali
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>