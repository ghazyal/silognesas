<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>


<?php if (in_groups('siswa')): ?>

<!-- =====================================================
     DASHBOARD SISWA
====================================================== -->

<div class="container-fluid p-0">

    <div class="student-welcome">

        <div class="welcome-content">

            <!-- =================================================
                 WELCOME TEXT
            ================================================== -->

            <div class="welcome-text">

                <span class="welcome-label">
                    SISTEM INFORMASI PERGUDANGAN
                </span>

                <h1>
                    Halo,
                    <span><?= esc(user()->username) ?></span> 👋
                </h1>

                <p class="welcome-description">

                    Selamat datang di sistem informasi pergudangan.
                    Semoga kegiatan pembelajaran dan praktikmu
                    hari ini berjalan dengan lancar.

                </p>


                <!-- =================================================
                     INFORMASI SISWA
                ================================================== -->

                <div class="welcome-info">

                    <div class="welcome-info-item">

                        <div class="welcome-icon">

                            <i data-feather="calendar"></i>

                        </div>

                        <div>

                            <small>
                                Hari ini
                            </small>

                            <strong>
                                <?= date('d F Y') ?>
                            </strong>

                        </div>

                    </div>


                    <div class="welcome-info-item">

                        <div class="welcome-icon">

                            <i data-feather="book-open"></i>

                        </div>

                        <div>

                            <small>
                                Status
                            </small>

                            <strong>
                                Siswa
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 ILUSTRASI GUDANG
            ================================================== -->

            <div class="welcome-illustration">

                <div class="illustration-circle"></div>


                <!-- Gudang -->

                <div class="warehouse">

                    <div class="warehouse-roof"></div>


                    <div class="warehouse-body">

                        <div class="warehouse-door"></div>


                        <div class="warehouse-window window-one"></div>

                        <div class="warehouse-window window-two"></div>


                        <div class="warehouse-box box-one"></div>

                        <div class="warehouse-box box-two"></div>

                        <div class="warehouse-box box-three"></div>

                    </div>

                </div>


                <!-- Floating Icons -->

                <div class="floating-box box-a">

                    <i data-feather="package"></i>

                </div>


                <div class="floating-box box-b">

                    <i data-feather="archive"></i>

                </div>


                <div class="floating-box box-c">

                    <i data-feather="layers"></i>

                </div>

            </div>

        </div>


        <!-- =================================================
             MOTIVATION
        ================================================== -->

        <div class="welcome-footer">

            <div class="quote-icon">

                <i data-feather="heart"></i>

            </div>


            <div>

                <strong>
                    Semangat belajar dan berkarya!
                </strong>

                <p>
                    Setiap proses kecil hari ini adalah bagian
                    dari perjalanan menuju masa depan.
                </p>

            </div>

        </div>

    </div>

</div>



<!-- =====================================================
     STYLE DASHBOARD SISWA
====================================================== -->

<style>

.student-welcome {

    position: relative;

    min-height: 520px;

    overflow: hidden;

    padding: 55px 60px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #f8fbff 0%,
            #eef5ff 55%,
            #e5f0ff 100%
        );

    box-shadow:
        0 10px 35px rgba(13, 110, 253, 0.08);

}


.welcome-content {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    justify-content: space-between;

    min-height: 390px;

}


.welcome-text {

    width: 52%;

}


.welcome-label {

    display: inline-block;

    margin-bottom: 18px;

    padding: 7px 14px;

    border-radius: 30px;

    background: rgba(13, 110, 253, 0.1);

    color: #0d6efd;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 1.5px;

}


.welcome-text h1 {

    margin-bottom: 18px;

    color: #212529;

    font-size: 42px;

    font-weight: 400;

    line-height: 1.2;

}


.welcome-text h1 span {

    color: #0d6efd;

    font-weight: 700;

}


.welcome-description {

    max-width: 540px;

    margin-bottom: 30px;

    color: #6c757d;

    font-size: 16px;

    line-height: 1.8;

}


.welcome-info {

    display: flex;

    gap: 15px;

}


.welcome-info-item {

    display: flex;

    align-items: center;

    gap: 12px;

    min-width: 160px;

    padding: 13px 17px;

    border-radius: 12px;

    background: rgba(255, 255, 255, 0.75);

    box-shadow:
        0 5px 15px rgba(0, 0, 0, 0.04);

}


.welcome-info-item small {

    display: block;

    margin-bottom: 2px;

    color: #6c757d;

    font-size: 11px;

}


.welcome-info-item strong {

    display: block;

    color: #343a40;

    font-size: 13px;

}


.welcome-icon {

    display: flex;

    align-items: center;

    justify-content: center;

    width: 38px;

    height: 38px;

    border-radius: 10px;

    background: #e8f1ff;

    color: #0d6efd;

}


.welcome-icon svg {

    width: 18px;

    height: 18px;

}


/* =====================================================
   ILUSTRASI
===================================================== */

.welcome-illustration {

    position: relative;

    width: 390px;

    height: 340px;

}


.illustration-circle {

    position: absolute;

    width: 300px;

    height: 300px;

    top: 15px;

    left: 45px;

    border-radius: 50%;

    background: rgba(13, 110, 253, 0.08);

}


/* =====================================================
   GUDANG
===================================================== */

.warehouse {

    position: absolute;

    left: 80px;

    bottom: 35px;

    width: 250px;

    height: 200px;

}


.warehouse-roof {

    position: absolute;

    top: 0;

    left: 0;

    width: 0;

    height: 0;

    border-left: 125px solid transparent;

    border-right: 125px solid transparent;

    border-bottom: 70px solid #0d6efd;

}


.warehouse-body {

    position: absolute;

    bottom: 0;

    width: 250px;

    height: 145px;

    border-radius: 5px;

    background: #ffffff;

    box-shadow:
        0 12px 25px rgba(13, 110, 253, 0.12);

}


/* =====================================================
   PINTU GUDANG
===================================================== */

.warehouse-door {

    position: absolute;

    bottom: 0;

    left: 92px;

    width: 65px;

    height: 95px;

    border-radius: 4px 4px 0 0;

    background: #dbe9ff;

    border: 5px solid #ffffff;

}


/* =====================================================
   JENDELA
===================================================== */

.warehouse-window {

    position: absolute;

    top: 25px;

    width: 38px;

    height: 35px;

    border-radius: 4px;

    background: #dcecff;

    border: 4px solid #ffffff;

}


.window-one {

    left: 25px;

}


.window-two {

    right: 25px;

}


/* =====================================================
   KOTAK BARANG
===================================================== */

.warehouse-box {

    position: absolute;

    width: 28px;

    height: 28px;

    border-radius: 3px;

    background: #ffc107;

}


.box-one {

    left: 20px;

    bottom: 12px;

}


.box-two {

    right: 22px;

    bottom: 12px;

    background: #198754;

}


.box-three {

    right: 52px;

    bottom: 12px;

    background: #dc3545;

}


/* =====================================================
   FLOATING ICON
===================================================== */

.floating-box {

    position: absolute;

    display: flex;

    align-items: center;

    justify-content: center;

    width: 55px;

    height: 55px;

    border-radius: 15px;

    background: #ffffff;

    color: #0d6efd;

    box-shadow:
        0 10px 25px rgba(0, 0, 0, 0.08);

}


.floating-box svg {

    width: 23px;

    height: 23px;

}


.box-a {

    top: 25px;

    right: 25px;

    transform: rotate(8deg);

}


.box-b {

    top: 145px;

    left: 15px;

    color: #198754;

    transform: rotate(-8deg);

}


.box-c {

    bottom: 5px;

    right: 5px;

    color: #ffc107;

    transform: rotate(7deg);

}


/* =====================================================
   FOOTER
===================================================== */

.welcome-footer {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    gap: 14px;

    padding-top: 20px;

    border-top: 1px solid rgba(0, 0, 0, 0.06);

}


.quote-icon {

    display: flex;

    align-items: center;

    justify-content: center;

    width: 42px;

    height: 42px;

    flex-shrink: 0;

    border-radius: 12px;

    background: #ffffff;

    color: #dc3545;

}


.quote-icon svg {

    width: 18px;

}


.welcome-footer strong {

    display: block;

    margin-bottom: 3px;

    color: #343a40;

    font-size: 13px;

}


.welcome-footer p {

    margin: 0;

    color: #6c757d;

    font-size: 12px;

}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .student-welcome {

        padding: 40px 30px;

    }


    .welcome-content {

        flex-direction: column;

        text-align: center;

    }


    .welcome-text {

        width: 100%;

    }


    .welcome-description {

        margin-left: auto;

        margin-right: auto;

    }


    .welcome-info {

        justify-content: center;

    }


    .welcome-illustration {

        margin-top: 20px;

        transform: scale(0.8);

    }

}


@media (max-width: 575px) {

    .student-welcome {

        padding: 35px 20px;

    }


    .welcome-text h1 {

        font-size: 32px;

    }


    .welcome-info {

        flex-direction: column;

        align-items: center;

    }


    .welcome-illustration {

        transform: scale(0.65);

        margin-top: -20px;

        margin-bottom: -40px;

    }


    .welcome-footer {

        text-align: left;

    }

}

</style>



<?php else: ?>


<!-- =====================================================
     DASHBOARD GURU & SUPERADMIN
====================================================== -->

<div class="container-fluid p-0">

    <h1 class="h3 mb-3">

        <strong>Analytics</strong> Dashboard

    </h1>


    <div class="row">


        <!-- =================================================
             STATISTIK
        ================================================== -->

        <div class="col-xl-6 col-xxl-5 d-flex">

            <div class="w-100">

                <div class="row">


                    <!-- KOLOM KIRI -->

                    <div class="col-sm-6">


                        <!-- TOTAL BARANG -->

                        <div class="card dashboard-card bg-barang shadow-sm">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col mt-0">

                                        <h5 class="card-title text-white">
                                            Total Barang
                                        </h5>

                                    </div>


                                    <div class="col-auto">

                                        <div class="stat icon-dashboard">

                                            <i data-feather="box"></i>

                                        </div>

                                    </div>

                                </div>


                                <h1 class="mt-1 mb-3 text-white">

                                    <?= number_format(
                                        $totalBarang,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h1>


                                <div class="mb-0">

                                    <span class="text-white">
                                        Total jenis barang aktif
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- TRANSAKSI MASUK -->

                        <div class="card dashboard-card bg-masuk shadow-sm">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col mt-0">

                                        <h5 class="card-title text-white">
                                            Transaksi Masuk
                                        </h5>

                                    </div>


                                    <div class="col-auto">

                                        <div class="stat icon-dashboard">

                                            <i data-feather="arrow-down-left"></i>

                                        </div>

                                    </div>

                                </div>


                                <h1 class="mt-1 mb-3 text-white">

                                    <?= number_format(
                                        $masuk,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h1>


                                <div class="mb-0">

                                    <span
                                        class="badge badge-dashboard
                                        <?= ($persenMasuk >= 0)
                                            ? 'bg-light text-success'
                                            : 'bg-light text-danger'
                                        ?>"
                                    >

                                        <?= abs($persenMasuk) ?>%

                                    </span>


                                    <span class="text-white">

                                        dibanding kemarin

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- KOLOM KANAN -->

                    <div class="col-sm-6">


                        <!-- STOK -->

                        <div class="card dashboard-card bg-stok shadow-sm">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col mt-0">

                                        <h5 class="card-title text-white">
                                            Stok Keseluruhan
                                        </h5>

                                    </div>


                                    <div class="col-auto">

                                        <div class="stat icon-dashboard">

                                            <i data-feather="database"></i>

                                        </div>

                                    </div>

                                </div>


                                <h1 class="mt-1 mb-3 text-white">

                                    <?= number_format(
                                        $totalStok,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h1>


                                <div class="mb-0">

                                    <span class="text-white">
                                        Total stok barang aktif
                                    </span>

                                </div>

                            </div>

                        </div>


                        <!-- TRANSAKSI KELUAR -->

                        <div class="card dashboard-card bg-keluar shadow-sm">

                            <div class="card-body">

                                <div class="row">

                                    <div class="col mt-0">

                                        <h5 class="card-title text-white">
                                            Transaksi Keluar
                                        </h5>

                                    </div>


                                    <div class="col-auto">

                                        <div class="stat icon-dashboard">

                                            <i data-feather="arrow-up-right"></i>

                                        </div>

                                    </div>

                                </div>


                                <h1 class="mt-1 mb-3 text-white">

                                    <?= number_format(
                                        $keluar,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>

                                </h1>


                                <div class="mb-0">

                                    <span
                                        class="badge badge-dashboard
                                        <?= ($persenKeluar >= 0)
                                            ? 'bg-light text-success'
                                            : 'bg-light text-danger'
                                        ?>"
                                    >

                                        <?= abs($persenKeluar) ?>%

                                    </span>


                                    <span class="text-white">

                                        dibanding kemarin

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             PENYIMPANAN GUDANG
        ================================================== -->

        <div
            class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3"
        >

            <div class="card flex-fill w-100">


                <div
                    class="card-header d-flex
                    justify-content-between
                    align-items-center"
                >

                    <h5 class="card-title mb-0">
                        Penyimpanan Gudang
                    </h5>


                    <span class="badge bg-primary">

                        <?= count($gudang) ?> Gudang

                    </span>

                </div>


                <div class="card-body d-flex">

                    <div class="align-self-center w-100">


                        <!-- PIE CHART -->

                        <div class="py-3">

                            <div class="chart chart-xs">

                                <canvas
                                    id="chartjs-dashboard-pie"
                                ></canvas>

                            </div>

                        </div>


                        <?php

                        $total = 0;

                        foreach ($gudang as $item) {

                            $total += $item['total'];

                        }


                        $warna = [

                            '#0d6efd',
                            '#198754',
                            '#dc3545',
                            '#ffc107',
                            '#0dcaf0',
                            '#6c757d'

                        ];


                        $i = 0;

                        foreach ($gudang as $g):


                        $persen = ($total > 0)

                            ? round(
                                ($g['total'] / $total) * 100
                            )

                            : 0;

                        ?>


                        <div class="mb-3">


                            <div
                                class="d-flex
                                justify-content-between
                                mb-1"
                            >

                                <span>

                                    Gudang <?= $g['gudang'] ?>

                                </span>


                                <small>

                                    <?= $g['total'] ?> barang

                                    (<?= $persen ?>%)

                                </small>

                            </div>


                            <div class="progress">

                                <div
                                    style="
                                        width: <?= $persen ?>%;
                                        height: 100%;
                                        background:
                                            <?= $warna[
                                                $i % count($warna)
                                            ] ?>;
                                        border-radius: 20px;
                                    "
                                ></div>

                            </div>

                        </div>


                        <?php

                        $i++;

                        endforeach;

                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =================================================
         GRAFIK MINGGUAN
    ================================================== -->

    <div class="row mt-4">

        <div class="col-12">

            <div class="card">


                <div class="card-header">

                    <h5 class="card-title mb-0">

                        Grafik Transaksi 7 Hari Terakhir

                    </h5>

                </div>


                <div class="card-body">

                    <canvas
                        id="chartMingguan"
                        height="90"
                    ></canvas>

                </div>


            </div>

        </div>

    </div>

</div>


<style>

.progress {

    height: 12px;

    border-radius: 20px;

    overflow: hidden;

    background: #e9ecef;

}

</style>


<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /* =====================================================
           PIE CHART GUDANG
        ====================================================== */

        const pie =
            document.getElementById(
                'chartjs-dashboard-pie'
            );


        if (pie) {

            new Chart(
                pie,
                {

                    type: 'pie',

                    data: {

                        labels: [

                            <?php foreach ($gudang as $g): ?>

                                '<?= esc($g['gudang']) ?>',

                            <?php endforeach ?>

                        ],


                        datasets: [

                            {

                                data: [

                                    <?php foreach ($gudang as $g): ?>

                                        <?= $g['total'] ?>,

                                    <?php endforeach ?>

                                ],


                                backgroundColor: [

                                    '#0d6efd',
                                    '#198754',
                                    '#dc3545',
                                    '#ffc107',
                                    '#6f42c1',
                                    '#20c997',
                                    '#fd7e14'

                                ]

                            }

                        ]

                    }

                }
            );

        }



        /* =====================================================
           GRAFIK TRANSAKSI MINGGUAN
        ====================================================== */

        const bar =
            document.getElementById(
                'chartMingguan'
            );


        if (bar) {

            new Chart(
                bar,
                {

                    type: 'bar',


                    data: {

                        labels: [

                            <?php foreach (
                                $grafikMingguan
                                as $g
                            ): ?>

                                '<?= date(
                                    'd M',
                                    strtotime(
                                        $g['tanggal']
                                    )
                                ) ?>',

                            <?php endforeach ?>

                        ],


                        datasets: [


                            {

                                label: 'Masuk',

                                data: [

                                    <?php foreach (
                                        $grafikMingguan
                                        as $g
                                    ): ?>

                                        <?= $g['masuk'] ?>,

                                    <?php endforeach ?>

                                ],

                                backgroundColor:
                                    '#198754'

                            },


                            {

                                label: 'Keluar',

                                data: [

                                    <?php foreach (
                                        $grafikMingguan
                                        as $g
                                    ): ?>

                                        <?= $g['keluar'] ?>,

                                    <?php endforeach ?>

                                ],

                                backgroundColor:
                                    '#dc3545'

                            }

                        ]

                    },


                    options: {

                        responsive: true,


                        scales: {

                            y: {

                                beginAtZero: true,

                                ticks: {

                                    precision: 0

                                }

                            }

                        }

                    }

                }
            );

        }

    }
);

</script>


<?php endif ?>


<?= $this->endSection() ?>