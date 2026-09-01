<?= $this->section('title') ?>
Tambah Data Barang
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Tambah Data <strong>Barang</strong>
    </h1>

    <div class="card mt-3">

        <div class="card-body">

            <form
                method="post"
                action="<?= base_url('barang/simpan') ?>"
                class="row g-3">

                <?= csrf_field() ?>


                <!-- Nama Barang -->
                <div class="col-md-6">

                    <label class="form-label">
                        Nama Barang
                    </label>

                    <input
                        class="form-control"
                        type="text"
                        name="nama_barang"
                        placeholder="Masukkan nama barang">

                </div>


                <!-- Harga Barang -->
                <div class="col-md-6">

                    <label class="form-label">
                        Harga Barang
                    </label>

                    <div class="input-group">

                        <span class="input-group-text">
                            Rp.
                        </span>

                        <input
                            class="form-control"
                            type="text"
                            id="harga_barang_display"
                            placeholder="0"
                            autocomplete="off">

                    </div>

                    <!-- Nilai asli yang dikirim ke database -->
                    <input
                        type="hidden"
                        name="harga_barang"
                        id="harga_barang">

                </div>


                <!-- Satuan -->
                <div class="col-md-6">

                    <label class="form-label">
                        Satuan
                    </label>

                    <select
                        name="satuan"
                        class="form-select">

                        <option value="">
                            == Pilih Satuan ==
                        </option>

                        <option value="box">
                            Box
                        </option>

                        <option value="lusin">
                            Lusin
                        </option>

                        <option value="buah">
                            Buah
                        </option>

                        <option value="rim">
                            Rim
                        </option>

                    </select>

                </div>


                <!-- Supplier -->
                <div class="col-md-6">

                    <label class="form-label">
                        Supplier
                    </label>

                    <select
                        name="id_supplier"
                        class="form-select">

                        <option value="">
                            == Pilih Supplier ==
                        </option>

                        <?php foreach($supplier as $s): ?>

                            <option
                                value="<?= $s['id_supplier'] ?>">

                                <?= esc($s['nama_supplier']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- Rak -->
                <div class="col-md-6">

                    <label class="form-label">
                        Rak
                    </label>

                    <select
                        name="id_rak"
                        class="form-select">

                        <option value="">
                            == Pilih Rak ==
                        </option>

                        <?php foreach($rak as $r): ?>

                            <option
                                value="<?= $r['id_rak'] ?>">

                                <?= esc($r['rak']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- Gudang -->
                <div class="col-md-6">

                    <label class="form-label">
                        Gudang
                    </label>

                    <select
                        name="id_gudang"
                        class="form-select">

                        <option value="">
                            == Pilih Gudang ==
                        </option>

                        <?php foreach($gudang as $g): ?>

                            <option
                                value="<?= $g['id_gudang'] ?>">

                                <?= esc($g['gudang']) ?>

                            </option>

                        <?php endforeach ?>

                    </select>

                </div>


                <!-- Tombol -->
                <div class="col-12">

                    <button
                        class="btn btn-success text-white"
                        type="submit">

                        Tambah

                    </button>

                    <a
                        class="btn btn-danger text-white"
                        href="<?= base_url('barang') ?>">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const hargaDisplay =
        document.getElementById('harga_barang_display');

    const hargaInput =
        document.getElementById('harga_barang');


    hargaDisplay.addEventListener('input', function () {

        let angka =
            this.value.replace(/\D/g, '');


        hargaInput.value = angka;


        if (angka !== '') {

            this.value =
                new Intl.NumberFormat('id-ID')
                    .format(angka);

        } else {

            this.value = '';

        }

    });


    document.querySelector('form').addEventListener('submit', function () {

        hargaInput.value =
            hargaDisplay.value.replace(/\D/g, '');

    });

});

</script>


<?= $this->endSection() ?>