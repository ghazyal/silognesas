<?= $this->section('title') ?>
Kelola Transaksi
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">
        Kelola <strong>Transaksi</strong>
    </h1>

    <div class="row mb-4 mt-4">
        <div class="col-12">

            <div class="card">

                <div class="card-header pb-0">

                    <a href="<?= base_url('transaksi/tambah') ?>"
                       class="btn btn-primary">

                       Tambah Transaksi

                    </a>

                </div>

                <div class="card-body">

    <!-- ================= TRANSAKSI MASUK ================= -->

    <h4 class="mb-3 text-success">
        <i data-feather="arrow-down-left"></i>
        Transaksi Barang Masuk
    </h4>

    <div class="table-responsive mb-5">

        <table class="table table-striped table-hover datatable">

            <thead>

                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th>Barang</th>
                    <th>Supplier</th>
                    <th class="text-center">Jumlah</th>
                    <th>User</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                foreach($transaksi as $t):

                    if($t['jenis_transaksi'] != 'masuk')
                    {
                        continue;
                    }
                ?>

                <tr>

                    <td class="text-center"><?= $no++ ?></td>

                    <td class="text-center">
                        <?= date('d-m-Y', strtotime($t['tanggal'])) ?>
                    </td>

                    <td><?= esc($t['nama_barang']) ?></td>

                    <td><?= esc($t['nama_supplier'] ?? '-') ?></td>

                    <td class="text-center"><?= $t['jumlah'] ?></td>

                    <td><?= esc($t['username']) ?></td>

                    <td><?= esc($t['keterangan']) ?></td>

                    <td class="text-center">

                        <a href="<?= base_url('transaksi/koreksi/'.$t['id_transaksi']) ?>"
                           class="btn btn-warning">

                            <i data-feather="edit"></i>

                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>


    <!-- ================= TRANSAKSI KELUAR ================= -->

    <h4 class="mb-3 text-danger">
        <i data-feather="arrow-up-right"></i>
        Transaksi Barang Keluar
    </h4>

    <div class="table-responsive">

        <table class="table table-striped table-hover datatable">

            <thead>

                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Tanggal</th>
                    <th>Barang</th>
                    <th class="text-center">Jumlah</th>
                    <th>User</th>
                    <th>Keterangan</th>
                    <th class="text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                <?php
                $no = 1;

                foreach($transaksi as $t):

                    if($t['jenis_transaksi'] != 'keluar')
                    {
                        continue;
                    }
                ?>

                <tr>

                    <td class="text-center"><?= $no++ ?></td>

                    <td class="text-center">
                        <?= date('d-m-Y', strtotime($t['tanggal'])) ?>
                    </td>

                    <td><?= esc($t['nama_barang']) ?></td>

                    <td class="text-center"><?= $t['jumlah'] ?></td>

                    <td><?= esc($t['username']) ?></td>

                    <td><?= esc($t['keterangan']) ?></td>

                    <td class="text-center">

                        <a href="<?= base_url('transaksi/koreksi/'.$t['id_transaksi']) ?>"
                           class="btn btn-warning">

                            <i data-feather="edit"></i>

                        </a>

                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>