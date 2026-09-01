<?= $this->section('title') ?>
Tambah Data Supplier
<?= $this->endSection() ?>
<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Tambah Data <strong>Supplier</strong></h1>
        <div class="card mt-3">
            <div class="card-body">
                <form method="post" action="<?php echo base_url('supplier/simpan')?>" class="row g-2">
                    <div class="col-6">
                        <label class="form-label">Nama Supplier</label>
                        <input class="form-control" type="text" name="nama_supplier">
                    </div>
                    <div class="col-6">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" type="email" name="email">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" id="" class="form-control"></textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Nomor Telepon</label>
                        <input class="form-control" type="number" name="no_hp">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-success text-white" type="submit">Tambah</button>
                        <a class="btn btn-danger text-white" type="submit" href="<?= base_url('supplier') ?>">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
</div>

<?= $this->endSection() ?>