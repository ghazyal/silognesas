<?= $this->section('title') ?>
Tambah Gudang
<?= $this->endSection() ?>
<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Tambah <strong>Gudang</strong></h1>
        <div class="card mt-3">
            <div class="card-body">
                <form method="post" action="<?= base_url('gudang/simpan') ?>" class="row g-2">
                    <?= csrf_field() ?>
                    <div class="col-6">
                        <label class="form-label">Gudang</label>
                        <input class="form-control" type="text" name="gudang" placeholder="A / B / Utama" required>
                    </div>
                    
                    <div class="col-12">
                        <button class="btn btn-success text-white" type="submit">Tambah</button>
                        <a class="btn btn-danger text-white" type="submit" href="<?= base_url('gudang') ?>">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
</div>

<?= $this->endSection() ?>