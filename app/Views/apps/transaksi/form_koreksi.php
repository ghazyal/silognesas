<?= $this->section('title') ?>
Koreksi Transaksi
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

<h1 class="h3 mb-3">
Koreksi <strong>Transaksi</strong>
</h1>

<div class="card mt-3">

<div class="card-body">

<form method="post"
action="<?= base_url(
'transaksi/update/' .
$transaksi['id_transaksi']
) ?>"
class="row g-2">

<?= csrf_field() ?>

<div class="col-6">

<label class="form-label">
Tanggal
</label>

<input
type="date"
name="tanggal"
class="form-control"
value="<?= $transaksi['tanggal'] ?>"
required>

</div>


<div class="col-6">

<label class="form-label">
Jenis Transaksi
</label>

<select
name="jenis_transaksi"
id="jenis"
class="form-select"
required>

<option
value="masuk"
<?= ($transaksi['jenis_transaksi']
=='masuk')
? 'selected'
: '' ?>>

Barang Masuk

</option>

<option
value="keluar"
<?= ($transaksi['jenis_transaksi']
=='keluar')
? 'selected'
: '' ?>>

Barang Keluar

</option>

</select>

</div>


<div class="col-6">

<label class="form-label">
Barang
</label>

<select
name="id_barang"
class="form-select"
required>

<?php foreach($barang as $b): ?>

<option
value="<?= $b['id_barang'] ?>"

<?= ($b['id_barang']
==
$transaksi['id_barang'])
? 'selected'
: '' ?>>

<?= $b['nama_barang'] ?>

</option>

<?php endforeach ?>

</select>

</div>


<div
class="col-6"
id="supplierField">

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
value="<?= $s['id_supplier'] ?>"

<?= ($s['id_supplier']
==
$transaksi['id_supplier'])
? 'selected'
: '' ?>>

<?= $s['nama_supplier'] ?>

</option>

<?php endforeach ?>

</select>

</div>


<div class="col-6">

<label class="form-label">
Jumlah
</label>

<input
type="number"
name="jumlah"
class="form-control"
value="<?= $transaksi['jumlah'] ?>"
required>

</div>


<div class="col-6">

<label class="form-label">
Keterangan
</label>

<input
type="text"
name="keterangan"
class="form-control"
value="<?= $transaksi['keterangan'] ?>">

</div>


<div class="col-12">

<button
class="btn btn-success"
type="submit">

Update

</button>

<a
href="<?= base_url(
'transaksi'
) ?>"
class="btn btn-danger">

Kembali

</a>

</div>

</form>

</div>
</div>
</div>


<script>

const jenis =
document.getElementById(
'jenis'
);

const supplier =
document.getElementById(
'supplierField'
);

function cekSupplier()
{
    if(
        jenis.value
        ==
        'keluar'
    )
    {
        supplier.style.display =
        'none';
    }
    else
    {
        supplier.style.display =
        'block';
    }
}

cekSupplier();

jenis.addEventListener(
'change',
cekSupplier
);

</script>

<?= $this->endSection() ?>