<?php

namespace App\Controllers;

use App\Models\dashboardModel;

class Dashboard extends BaseController
{
    protected $dashboardmodel;

    public function __construct()
    {
        $this->dashboardmodel = new dashboardModel();
    }

    public function index()
    {

        $masukHariIni = $this->dashboardmodel->masukHariIni();
        $masukKemarin = $this->dashboardmodel->masukKemarin();

        $persenMasuk = $this->dashboardmodel->persentase(
            $masukHariIni,
            $masukKemarin
        );

        $keluarHariIni = $this->dashboardmodel->keluarHariIni();
        $keluarKemarin = $this->dashboardmodel->keluarKemarin();

        $persenKeluar = $this->dashboardmodel->persentase(
            $keluarHariIni,
            $keluarKemarin
        );

        $grafikMingguan = $this->dashboardmodel->grafikMingguan();

        $data = [

            'totalBarang' =>
                $this->dashboardmodel->totalBarang(),

            'totalStok' =>
                $this->dashboardmodel->totalStok(),

            'masuk' =>
                $masukHariIni,

            'keluar' =>
                $keluarHariIni,

            'gudang' =>
                $this->dashboardmodel->barangGudang(),

            'persenMasuk' =>
                $persenMasuk,

            'persenKeluar' =>
                $persenKeluar,

            'grafikMingguan' =>
                $grafikMingguan

        ];

        return view(
            'dashboard',
            $data
        );
    }
}