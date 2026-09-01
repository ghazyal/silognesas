<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Stok Barang</title>

    <style>

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #222;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 5px 0 0 0;
            font-size: 10px;
            color: #555;
        }

        .info {
            margin-bottom: 12px;
            font-size: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #e9ecef;
            border: 1px solid #555;
            padding: 7px;
            text-align: center;
            font-weight: bold;
        }

        td {
            border: 1px solid #777;
            padding: 6px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 15px;
            font-size: 9px;
            color: #666;
        }

    </style>

</head>

<body>


    <!-- HEADER -->

    <div class="header">

        <h2>
            LAPORAN STOK BARANG
        </h2>

        <p>
            Sistem Informasi Pergudangan
        </p>

    </div>


    <!-- INFORMASI -->

    <div class="info">

        Tanggal Cetak:
        <?= date('d-m-Y') ?>

    </div>


    <!-- TABEL -->

    <table>

        <thead>

            <tr>

                <th width="8%">
                    No
                </th>

                <th width="37%">
                    Barang
                </th>

                <th width="15%">
                    Stok
                </th>

                <th width="15%">
                    Satuan
                </th>

                <th width="25%">
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


                    <td class="text-center">

                        <?= esc(
                            $s['stok']
                        ) ?>

                    </td>


                    <td class="text-center">

                        <?= esc(
                            $s['satuan']
                        ) ?>

                    </td>


                    <td class="text-right">

                        <?= rupiah(
                            $s['harga_barang']
                        ) ?>

                    </td>

                </tr>

            <?php endforeach ?>


            <?php if (empty($stok)): ?>

                <tr>

                    <td
                        colspan="5"
                        class="text-center">

                        Tidak ada data stok barang

                    </td>

                </tr>

            <?php endif ?>

        </tbody>

    </table>


    <!-- FOOTER -->

    <div class="footer">

        Menampilkan data stok barang yang tercatat
        pada sistem.

    </div>


</body>

</html>