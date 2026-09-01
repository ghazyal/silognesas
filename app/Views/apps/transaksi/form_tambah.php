<?= $this->section('title') ?>
Tambah Transaksi
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

<h1 class="h3 mb-3">
Tambah <strong>Transaksi</strong>
</h1>

<div class="card mt-3">

<div class="card-body">

<form method="post"
action="<?= base_url('transaksi/simpan') ?>"
class="row g-2">

<?= csrf_field() ?>

<div class="col-6">

<label>Tanggal</label>

<input
type="date"
class="form-control"
name="tanggal"
required>

</div>


<div class="col-6">

<label>Jenis Transaksi</label>

<select
name="jenis_transaksi"
id="jenis"
class="form-select"
required>

<option value="">
== Pilih ==
</option>

<option value="masuk">
Barang Masuk
</option>

<option value="keluar">
Barang Keluar
</option>

</select>

</div>


<div class="col-6">

<label>Barang</label>

<select
name="id_barang"
id="barang"
class="form-select"
required>

<option value="">
== Pilih Barang ==
</option>

<?php foreach($barang as $b): ?>

<option value="<?= $b['id_barang'] ?>">

<?= $b['nama_barang'] ?>

</option>

<?php endforeach ?>

</select>

</div>


<div
class="col-6"
id="supplierField">

<label>Supplier</label>

<select
name="id_supplier"
id="supplier"
class="form-select">

<option value="">
== Supplier otomatis ==
</option>

</select>

</div>


<div class="col-6">

<label>Jumlah</label>

<input
type="number"
name="jumlah"
class="form-control"
required>

</div>


<div class="col-6">

<label>Keterangan</label>

<input
type="text"
name="keterangan"
class="form-control">

</div>


<div class="col-12">

<button class="btn btn-success">

Tambah

</button>

<a href="<?= base_url('transaksi')?>"
class="btn btn-danger">

Kembali

</a>

</div>

</form>

</div>

</div>

</div>


<script>

const jenis=
document.getElementById(
'jenis'
);

const supplierField=
document.getElementById(
'supplierField'
);

const barang=
document.getElementById(
'barang'
);

const supplier=
document.getElementById(
'supplier'
);


// tampil/sembunyi supplier
function cekSupplier()
{
    if(
        jenis.value
        ==
        'keluar'
    )
    {
        supplierField.style.display=
        'none';
    }
    else
    {
        supplierField.style.display=
        'block';
    }
}

cekSupplier();

jenis.addEventListener(
'change',
cekSupplier
);


// supplier otomatis
barang.addEventListener(
'change',

function(){

let idBarang=
this.value;

if(idBarang=='')
{
    supplier.innerHTML=
    `<option>
    == Supplier otomatis ==
    </option>`;

    return;
}

fetch(
'<?= base_url("transaksi/getSupplier") ?>/'+idBarang
)

.then(
response=>response.json()
)

.then(data=>{

supplier.innerHTML=

`<option value="${data.id_supplier}">
${data.nama_supplier}
</option>`;

})

.catch(error=>{

console.log(error);

});

});

</script>

<?= $this->endSection() ?>