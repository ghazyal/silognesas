<?= $this->section('title') ?>
Edit Data Supplier
<?= $this->endSection() ?>
<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<h1 class="h3 mb-3">Edit Data <strong>Supplier</strong></h1>
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= base_url('supplier/update/' . $supplier['id_supplier']) ?>" class="row g-3">

                <?= csrf_field() ?>

                <div class="col-6">
                    <label class="form-label">Nama Supplier</label>
                    <input class="form-control" type="text" name="nama_supplier" value="<?= $supplier['nama_supplier'] ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="<?= $supplier['email'] ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="<?= $supplier['alamat'] ?>">
                </div>
                <div class="col-6">
                    <label class="form-label">No. Telepon</label>
                    <input class="form-control" type="text" name="no_hp" value="<?= $supplier['no_hp'] ?>">
                </div>
                <div class="col-12">
                    <button class="btn btn-success text-white" type="submit">Update</button>
                    <a class="btn btn-danger text-white" type="submit" href="<?= base_url('supplier') ?>">Kembali</a>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection() ?>