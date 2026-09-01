<?= $this->section('title') ?>
Laporan
<?= $this->endSection() ?>


<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>


<div class="container-fluid p-0">


    <h1 class="h3 mb-3">
        <strong>Laporan</strong>
    </h1>


    <div class="card">


        <div class="card-header">

            <button
                class="btn btn-primary"
                onclick="showLaporan('transaksi')">

                Laporan Transaksi

            </button>


            <button
                class="btn btn-success"
                onclick="showLaporan('stok')">

                Laporan Stok

            </button>

        </div>


        <div class="card-body">


            <!-- =================================================
                 LAPORAN TRANSAKSI
            ================================================== -->

            <div id="transaksi">


                <h4 class="mb-3">
                    Laporan Transaksi
                </h4>


                <!-- =================================================
                     FILTER TANGGAL TRANSAKSI
                ================================================== -->

                <form
                    action="<?= base_url('laporan') ?>"
                    method="get"
                    class="row g-3 mb-4"
                >

                    <div class="col-md-3">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="<?= esc($tanggalMulai ?? '') ?>"
                        >

                    </div>


                    <div class="col-md-3">

                        <label class="form-label">
                            Tanggal Akhir
                        </label>

                        <input
                            type="date"
                            name="tanggal_akhir"
                            class="form-control"
                            value="<?= esc($tanggalAkhir ?? '') ?>"
                        >

                    </div>


                    <div class="col-md-6 d-flex align-items-end gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i data-feather="search"></i>

                            Tampilkan

                        </button>


                        <a
                            href="<?= base_url('laporan') ?>"
                            class="btn btn-secondary"
                        >

                            <i data-feather="refresh-cw"></i>

                            Reset

                        </a>

                    </div>

                </form>


                <!-- =================================================
                     TRANSAKSI MASUK
                ================================================== -->

                <h5 class="mt-4 mb-3">
                    Transaksi Masuk
                </h5>


                <div class="table-responsive mb-4">


                    <table class="table table-striped table-hover datatable">


                        <thead>

                            <tr>

                                <th class="text-center">
                                    No
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Barang
                                </th>

                                <th>
                                    Supplier
                                </th>

                                <th>
                                    Jumlah
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th>
                                    User
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        <?php

                        $noMasuk = 1;
                        $adaMasuk = false;

                        foreach ($transaksi as $t):

                            if ($t['jenis_transaksi'] != 'masuk') {
                                continue;
                            }

                            $adaMasuk = true;

                        ?>

                            <tr>

                                <td class="text-center">

                                    <?= $noMasuk++ ?>

                                </td>


                                <td>

                                    <?= date(
                                        'd-m-Y',
                                        strtotime(
                                            $t['tanggal']
                                        )
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['nama_barang']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['nama_supplier']
                                        ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['jumlah']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['keterangan']
                                        ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['username']
                                    ) ?>

                                </td>

                            </tr>


                        <?php endforeach ?>


                        <?php if (!$adaMasuk): ?>

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center">

                                    Tidak ada transaksi masuk

                                </td>

                            </tr>

                        <?php endif ?>


                        </tbody>

                    </table>

                </div>



                <!-- =================================================
                     TRANSAKSI KELUAR
                ================================================== -->

                <h5 class="mt-4 mb-3">
                    Transaksi Keluar
                </h5>


                <div class="table-responsive mb-4">


                    <table class="table table-striped table-hover datatable">


                        <thead>

                            <tr>

                                <th class="text-center">
                                    No
                                </th>

                                <th>
                                    Tanggal
                                </th>

                                <th>
                                    Barang
                                </th>

                                <th>
                                    Jumlah
                                </th>

                                <th>
                                    Keterangan
                                </th>

                                <th>
                                    User
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        <?php

                        $noKeluar = 1;
                        $adaKeluar = false;

                        foreach ($transaksi as $t):

                            if ($t['jenis_transaksi'] != 'keluar') {
                                continue;
                            }

                            $adaKeluar = true;

                        ?>

                            <tr>

                                <td class="text-center">

                                    <?= $noKeluar++ ?>

                                </td>


                                <td>

                                    <?= date(
                                        'd-m-Y',
                                        strtotime(
                                            $t['tanggal']
                                        )
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['nama_barang']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['jumlah']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['keterangan']
                                        ?? '-'
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $t['username']
                                    ) ?>

                                </td>

                            </tr>


                        <?php endforeach ?>


                        <?php if (!$adaKeluar): ?>

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center">

                                    Tidak ada transaksi keluar

                                </td>

                            </tr>

                        <?php endif ?>


                        </tbody>

                    </table>

                </div>



                <!-- =================================================
                     EXPORT TRANSAKSI
                ================================================== -->

                <div class="mt-3">


                    <a
                        href="<?= base_url(
                            'laporan/excel/transaksi'
                        ) . '?tanggal_mulai=' . urlencode(
                            $tanggalMulai ?? ''
                        ) . '&tanggal_akhir=' . urlencode(
                            $tanggalAkhir ?? ''
                        ) ?>"
                        class="btn btn-success"
                    >

                        <i data-feather="file"></i>

                        Export Excel

                    </a>


                    <a
                        href="<?= base_url(
                            'laporan/pdf/transaksi'
                        ) . '?tanggal_mulai=' . urlencode(
                            $tanggalMulai ?? ''
                        ) . '&tanggal_akhir=' . urlencode(
                            $tanggalAkhir ?? ''
                        ) ?>"
                        class="btn btn-danger"
                    >

                        <i data-feather="book"></i>

                        Export PDF

                    </a>

                </div>


            </div>



            <!-- =================================================
                 LAPORAN STOK
            ================================================== -->

            <div
                id="stok"
                style="display:none;"
            >


                <h4 class="mb-3">
                    Laporan Stok Barang
                </h4>


                <div class="table-responsive">


                    <table class="table table-striped table-hover datatable">


                        <thead>

                            <tr>

                                <th class="text-center">
                                    No
                                </th>

                                <th>
                                    Barang
                                </th>

                                <th>
                                    Stok
                                </th>

                                <th>
                                    Satuan
                                </th>

                                <th>
                                    Harga
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                        <?php

                        $no = 1;

                        foreach ($stok as $s):

                        ?>

                            <tr>

                                <td class="text-center">

                                    <?= $no++ ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $s['nama_barang']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $s['stok']
                                    ) ?>

                                </td>


                                <td>

                                    <?= esc(
                                        $s['satuan']
                                    ) ?>

                                </td>


                                <td>

                                    <?= rupiah(
                                        $s['harga_barang']
                                    ) ?>

                                </td>

                            </tr>


                        <?php endforeach ?>


                        </tbody>

                    </table>



                    <!-- =================================================
                         EXPORT STOK
                    ================================================== -->

                    <a
                        href="<?= base_url(
                            'laporan/excel/stok'
                        ) ?>"
                        class="btn btn-success"
                    >

                        <i data-feather="file"></i>

                        Export Excel

                    </a>


                    <a
                        href="<?= base_url(
                            'laporan/pdf/stok'
                        ) ?>"
                        class="btn btn-danger"
                    >

                        <i data-feather="book"></i>

                        Export PDF

                    </a>


                </div>


            </div>


        </div>

    </div>

</div>



<script>

function showLaporan(menu)
{
    document
        .getElementById('transaksi')
        .style.display = 'none';


    document
        .getElementById('stok')
        .style.display = 'none';


    document
        .getElementById(menu)
        .style.display = 'block';
}

</script>


<?= $this->endSection() ?>