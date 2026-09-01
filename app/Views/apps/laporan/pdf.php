<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Transaksi
    </title>

    <style>

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            text-align: center;
            background-color: #eeeeee;
        }

        td.center {
            text-align: center;
        }

    </style>

</head>


<body>


    <h2>
        LAPORAN TRANSAKSI
    </h2>

    <?php if (!empty($tanggalMulai) || !empty($tanggalAkhir)): ?>

        <p style="text-align: center; margin-top: -10px;">

            Periode:

            <?= !empty($tanggalMulai)
                ? date('d-m-Y', strtotime($tanggalMulai))
                : '-'
            ?>

            s/d

            <?= !empty($tanggalAkhir)
                ? date('d-m-Y', strtotime($tanggalAkhir))
                : '-'
            ?>

        </p>

    <?php else: ?>

        <p style="text-align: center; margin-top: -10px;">
            Periode: Semua Data
        </p>

    <?php endif ?>

    <!-- =================================================
         TRANSAKSI MASUK
    ================================================== -->

    <h3>
        Transaksi Masuk
    </h3>


    <table>


        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="15%">
                    Tanggal
                </th>

                <th width="20%">
                    Barang
                </th>

                <th width="20%">
                    Supplier
                </th>

                <th width="10%">
                    Jumlah
                </th>

                <th width="20%">
                    Keterangan
                </th>

                <th width="10%">
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

                <td class="center">
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


                <td class="center">
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
                    class="center">

                    Tidak ada transaksi masuk

                </td>

            </tr>

        <?php endif ?>


        </tbody>

    </table>



    <!-- =================================================
         TRANSAKSI KELUAR
    ================================================== -->

    <h3>
        Transaksi Keluar
    </h3>


    <table>


        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="15%">
                    Tanggal
                </th>

                <th width="25%">
                    Barang
                </th>

                <th width="10%">
                    Jumlah
                </th>

                <th width="30%">
                    Keterangan
                </th>

                <th width="15%">
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

                <td class="center">
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


                <td class="center">
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
                    class="center">

                    Tidak ada transaksi keluar

                </td>

            </tr>

        <?php endif ?>


        </tbody>

    </table>


</body>

</html>