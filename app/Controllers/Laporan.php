<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;

use App\Models\laporanModel;

class Laporan extends BaseController
{
    protected $laporanmodel;

    public function __construct()
    {
        $this->laporanmodel = new laporanModel();
    }

    public function index()
    {
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        $data = [
            'pageTitle' => 'Laporan',

            'transaksi' => $this->laporanmodel
                ->laporanTransaksi(
                    $tanggalMulai,
                    $tanggalAkhir
                ),

            'stok' => $this->laporanmodel
                ->laporanStok(),

            'tanggalMulai' => $tanggalMulai,
            'tanggalAkhir' => $tanggalAkhir
        ];

        return view(
            'apps/laporan/laporan',
            $data
        );
    }


    // =====================================================
    // EXPORT EXCEL TRANSAKSI
    // =====================================================

    public function exportExcelTransaksi()
    {
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        $transaksi = $this->laporanmodel
            ->laporanTransaksi(
                $tanggalMulai,
                $tanggalAkhir
            );

        $spreadsheet = new Spreadsheet();

        /*
        |--------------------------------------------------------------------------
        | STYLE
        |--------------------------------------------------------------------------
        */

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        $headerStyle = [
            'font' => [
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | SHEET 1 - TRANSAKSI MASUK
        |--------------------------------------------------------------------------
        */

        $sheetMasuk = $spreadsheet->getActiveSheet();

        $sheetMasuk->setTitle('Transaksi Masuk');

        // Judul
        $sheetMasuk->setCellValue(
            'A1',
            'LAPORAN TRANSAKSI MASUK'
        );

        $sheetMasuk->mergeCells('A1:F1');

        $sheetMasuk->getStyle('A1:F1')
            ->getFont()
            ->setBold(true);

        $sheetMasuk->getStyle('A1:F1')
            ->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        // Header
        $sheetMasuk->setCellValue('A3', 'No');
        $sheetMasuk->setCellValue('B3', 'Tanggal');
        $sheetMasuk->setCellValue('C3', 'Barang');
        $sheetMasuk->setCellValue('D3', 'Supplier');
        $sheetMasuk->setCellValue('E3', 'Jumlah');
        $sheetMasuk->setCellValue('F3', 'User');

        $sheetMasuk->getStyle('A3:F3')
            ->applyFromArray($headerStyle);

        $baris = 4;
        $no = 1;

        foreach ($transaksi as $t) {

            if ($t['jenis_transaksi'] != 'masuk') {
                continue;
            }

            $sheetMasuk->setCellValue(
                'A' . $baris,
                $no++
            );

            $sheetMasuk->setCellValue(
                'B' . $baris,
                date(
                    'd-m-Y',
                    strtotime($t['tanggal'])
                )
            );

            $sheetMasuk->setCellValue(
                'C' . $baris,
                $t['nama_barang']
            );

            $sheetMasuk->setCellValue(
                'D' . $baris,
                $t['nama_supplier'] ?? '-'
            );

            $sheetMasuk->setCellValue(
                'E' . $baris,
                $t['jumlah']
            );

            $sheetMasuk->setCellValue(
                'F' . $baris,
                $t['username']
            );

            $baris++;
        }

        // Border tabel
        if ($baris > 4) {
            $sheetMasuk->getStyle(
                'A3:F' . ($baris - 1)
            )->applyFromArray($borderStyle);
        }

        // Rata tengah
        $sheetMasuk->getStyle(
            'A3:B' . max(3, $baris - 1)
        )->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        $sheetMasuk->getStyle(
            'E3:E' . max(3, $baris - 1)
        )->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        // Lebar kolom
        $sheetMasuk->getColumnDimension('A')->setWidth(8);
        $sheetMasuk->getColumnDimension('B')->setWidth(15);
        $sheetMasuk->getColumnDimension('C')->setWidth(30);
        $sheetMasuk->getColumnDimension('D')->setWidth(30);
        $sheetMasuk->getColumnDimension('E')->setWidth(12);
        $sheetMasuk->getColumnDimension('F')->setWidth(20);

        // Freeze header
        $sheetMasuk->freezePane('A4');


        /*
        |--------------------------------------------------------------------------
        | SHEET 2 - TRANSAKSI KELUAR
        |--------------------------------------------------------------------------
        */

        $sheetKeluar = $spreadsheet->createSheet();

        $sheetKeluar->setTitle('Transaksi Keluar');

        // Judul
        $sheetKeluar->setCellValue(
            'A1',
            'LAPORAN TRANSAKSI KELUAR'
        );

        $sheetKeluar->mergeCells('A1:E1');

        $sheetKeluar->getStyle('A1:E1')
            ->getFont()
            ->setBold(true);

        $sheetKeluar->getStyle('A1:E1')
            ->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        // Header
        $sheetKeluar->setCellValue('A3', 'No');
        $sheetKeluar->setCellValue('B3', 'Tanggal');
        $sheetKeluar->setCellValue('C3', 'Barang');
        $sheetKeluar->setCellValue('D3', 'Jumlah');
        $sheetKeluar->setCellValue('E3', 'User');

        $sheetKeluar->getStyle('A3:E3')
            ->applyFromArray($headerStyle);

        $baris = 4;
        $no = 1;

        foreach ($transaksi as $t) {

            if ($t['jenis_transaksi'] != 'keluar') {
                continue;
            }

            $sheetKeluar->setCellValue(
                'A' . $baris,
                $no++
            );

            $sheetKeluar->setCellValue(
                'B' . $baris,
                date(
                    'd-m-Y',
                    strtotime($t['tanggal'])
                )
            );

            $sheetKeluar->setCellValue(
                'C' . $baris,
                $t['nama_barang']
            );

            $sheetKeluar->setCellValue(
                'D' . $baris,
                $t['jumlah']
            );

            $sheetKeluar->setCellValue(
                'E' . $baris,
                $t['username']
            );

            $baris++;
        }

        // Border tabel
        if ($baris > 4) {
            $sheetKeluar->getStyle(
                'A3:E' . ($baris - 1)
            )->applyFromArray($borderStyle);
        }

        // Rata tengah
        $sheetKeluar->getStyle(
            'A3:B' . max(3, $baris - 1)
        )->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        $sheetKeluar->getStyle(
            'D3:D' . max(3, $baris - 1)
        )->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        // Lebar kolom
        $sheetKeluar->getColumnDimension('A')->setWidth(8);
        $sheetKeluar->getColumnDimension('B')->setWidth(15);
        $sheetKeluar->getColumnDimension('C')->setWidth(30);
        $sheetKeluar->getColumnDimension('D')->setWidth(12);
        $sheetKeluar->getColumnDimension('E')->setWidth(20);

        // Freeze header
        $sheetKeluar->freezePane('A4');


        /*
        |--------------------------------------------------------------------------
        | EXPORT
        |--------------------------------------------------------------------------
        */

        $writer = new Xlsx($spreadsheet);

        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        header(
            'Content-Disposition: attachment; filename="Laporan_Transaksi.xlsx"'
        );

        header(
            'Cache-Control: max-age=0'
        );

        $writer->save('php://output');

        exit;
    }


    // =====================================================
    // EXPORT PDF TRANSAKSI
    // =====================================================

    public function exportPdfTransaksi()
    {
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalAkhir = $this->request->getGet('tanggal_akhir');

        $data = [
            'transaksi' => $this->laporanmodel
                ->laporanTransaksi(
                    $tanggalMulai,
                    $tanggalAkhir
                ),

            'tanggalMulai' => $tanggalMulai,
            'tanggalAkhir' => $tanggalAkhir
        ];

        $html = view(
            'apps/laporan/pdf',
            $data
        );

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper(
            'A4',
            'landscape'
        );

        $dompdf->render();

        $dompdf->stream(
            'Laporan_Transaksi.pdf',
            [
                'Attachment' => true
            ]
        );
    }


    // =====================================================
    // EXPORT EXCEL STOK
    // =====================================================

    public function exportExcelStok()
    {
        $stok = $this->laporanmodel
                        ->laporanStok();


        $spreadsheet = new Spreadsheet();


        $sheet =
            $spreadsheet
                ->getActiveSheet();


        $sheet->setTitle('Laporan Stok');


        // =====================================================
        // JUDUL
        // =====================================================

        $sheet->setCellValue(
            'A1',
            'LAPORAN STOK BARANG'
        );

        $sheet->mergeCells('A1:E1');


        $sheet->getStyle('A1:E1')
            ->getFont()
            ->setBold(true);

        $sheet->getStyle('A1:E1')
            ->getFont()
            ->setSize(14);


        $sheet->getStyle('A1:E1')
            ->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );

        $sheet->getStyle('A1:E1')
            ->getAlignment()
            ->setVertical(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            );


        $sheet->getRowDimension(1)
            ->setRowHeight(25);


        // =====================================================
        // KETERANGAN
        // =====================================================

        $sheet->setCellValue(
            'A2',
            'Tanggal Cetak: ' . date('d-m-Y')
        );

        $sheet->mergeCells('A2:E2');


        $sheet->getStyle('A2:E2')
            ->getFont()
            ->setItalic(true);

        $sheet->getStyle('A2:E2')
            ->getFont()
            ->setSize(10);


        // =====================================================
        // HEADER TABEL
        // =====================================================

        $sheet->setCellValue(
            'A4',
            'No'
        );

        $sheet->setCellValue(
            'B4',
            'Barang'
        );

        $sheet->setCellValue(
            'C4',
            'Stok'
        );

        $sheet->setCellValue(
            'D4',
            'Satuan'
        );

        $sheet->setCellValue(
            'E4',
            'Harga'
        );


        // =====================================================
        // STYLE HEADER
        // =====================================================

        $sheet->getStyle('A4:E4')
            ->getFont()
            ->setBold(true);


        $sheet->getStyle('A4:E4')
            ->getAlignment()
            ->setHorizontal(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
            );


        $sheet->getStyle('A4:E4')
            ->getAlignment()
            ->setVertical(
                \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            );


        $sheet->getStyle('A4:E4')
            ->getFill()
            ->setFillType(
                \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID
            );


        $sheet->getStyle('A4:E4')
            ->getFill()
            ->getStartColor()
            ->setRGB('D9EAF7');


        $sheet->getRowDimension(4)
            ->setRowHeight(22);


        // =====================================================
        // DATA
        // =====================================================

        $baris = 5;
        $no = 1;


        foreach ($stok as $s) {

            $sheet->setCellValue(
                'A' . $baris,
                $no++
            );


            $sheet->setCellValue(
                'B' . $baris,
                $s['nama_barang']
            );


            $sheet->setCellValue(
                'C' . $baris,
                $s['stok']
            );


            $sheet->setCellValue(
                'D' . $baris,
                $s['satuan']
            );


            $sheet->setCellValue(
                'E' . $baris,
                rupiah(
                    $s['harga_barang']
                )
            );


            $baris++;
        }


        // =====================================================
        // BORDER
        // =====================================================

        if ($baris > 5) {

            $sheet
                ->getStyle(
                    'A4:E' . ($baris - 1)
                )
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(
                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                );
        }


        // =====================================================
        // ALIGNMENT DATA
        // =====================================================

        if ($baris > 5) {

            $sheet
                ->getStyle(
                    'A5:A' . ($baris - 1)
                )
                ->getAlignment()
                ->setHorizontal(
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                );


            $sheet
                ->getStyle(
                    'C5:D' . ($baris - 1)
                )
                ->getAlignment()
                ->setHorizontal(
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
                );


            $sheet
                ->getStyle(
                    'E5:E' . ($baris - 1)
                )
                ->getAlignment()
                ->setHorizontal(
                    \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT
                );
        }


        // =====================================================
        // LEBAR KOLOM
        // =====================================================

        $sheet
            ->getColumnDimension('A')
            ->setWidth(8);


        $sheet
            ->getColumnDimension('B')
            ->setWidth(35);


        $sheet
            ->getColumnDimension('C')
            ->setWidth(12);


        $sheet
            ->getColumnDimension('D')
            ->setWidth(15);


        $sheet
            ->getColumnDimension('E')
            ->setWidth(22);


        // =====================================================
        // FREEZE HEADER
        // =====================================================

        $sheet->freezePane('A5');


        // =====================================================
        // EXPORT
        // =====================================================

        $writer =
            new Xlsx(
                $spreadsheet
            );


        header(
            'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );


        header(
            'Content-Disposition: attachment; filename="Laporan_Stok.xlsx"'
        );


        header(
            'Cache-Control: max-age=0'
        );


        $writer->save(
            'php://output'
        );


        exit;
    }


    // =====================================================
    // EXPORT PDF STOK
    // =====================================================

    public function exportPdfStok()
    {
        $data['stok'] =
            $this->laporanmodel
                ->laporanStok();

        $html =
            view(
                'apps/laporan/pdf_stok',
                $data
            );

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->setPaper(
            'A4',
            'portrait'
        );

        $dompdf->render();

        $dompdf->stream(
            'Laporan_Stok.pdf',
            [
                'Attachment' => true
            ]
        );
    }
}