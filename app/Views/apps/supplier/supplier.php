<?= $this->section('title') ?>
Kelola Supplier
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>Supplier</strong>
    </h1>

    <div class="row mb-4 mt-4">

        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <div class="row">

                        <div class="col-md-5 col-12 mb-2">

                            <a href="<?= base_url('supplier/tambah')?>"
                               class="btn btn-primary">

                                Tambah Data Supplier

                            </a>

                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-striped table-hover datatable">

                            <thead>

                                <tr>

                                    <th class="text-center">
                                        No
                                    </th>

                                    <th class="text-center">
                                        Nama Supplier
                                    </th>

                                    <th class="text-center">
                                        E-Mail
                                    </th>

                                    <th class="text-center">
                                        Alamat
                                    </th>

                                    <th class="text-center">
                                        No. Telp
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            <?php if(!empty($supplier)): ?>

                                <?php
                                $no=1;

                                foreach(
                                    $supplier as $s
                                ):
                                ?>

                                <tr>

                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($s['nama_supplier']) ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($s['email']) ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($s['alamat']) ?>
                                    </td>

                                    <td class="text-start">
                                        <?= esc($s['no_hp']) ?>
                                    </td>

                                    <td class="text-center">

                                        <a href="<?= base_url(
                                            'supplier/edit/'.
                                            $s['id_supplier']
                                        ) ?>"
                                        class="btn btn-success">

                                            <i data-feather="edit"></i>

                                        </a>

                                        <a href="#"
                                           class="btn btn-danger btn-hapus"

                                           data-url="<?= base_url(
                                            'supplier/delete/'.
                                            $s['id_supplier']
                                           ) ?>">

                                            <i data-feather="trash-2"></i>

                                        </a>

                                    </td>

                                </tr>

                                <?php endforeach ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="6"
                                        class="text-center">

                                        Tidak Ada Data Supplier

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

document
.querySelectorAll(
'.btn-hapus'
)

.forEach(function(btn){

btn.addEventListener(

'click',

function(e){

e.preventDefault();

let url=
this.dataset.url;

Swal.fire({

title:'Yakin?',

text:
'Supplier akan dinonaktifkan',

icon:'warning',

showCancelButton:true,

confirmButtonColor:
'#dc3545',

cancelButtonColor:
'#6c757d',

confirmButtonText:
'Ya',

cancelButtonText:
'Tidak'

})

.then((result)=>{

if(
result.isConfirmed
)
{
window.location=
url;
}

});

});

});

</script>

<?= $this->endSection() ?>