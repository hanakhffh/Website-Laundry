<?php
include('koneksi.php');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Alamat');
$sheet->setCellValue('D1', 'No_HP');
$sheet->setCellValue('E1', 'Tgl_Terima');
$sheet->setCellValue('F1', 'Tgl_Ambil');
$sheet->setCellValue('G1', 'jenislayanan');

$query = mysqli_query($conn, "SELECT No_Identitas, Nama, Alamat, No_Hp, Tgl_Terima, Tgl_Ambil, jenislayanan FROM detail");
$i = 2;
$no = 1;

while($row = mysqli_fetch_array($query))
{
        $sheet->setCellValue('A1' . $i, $row ['No_Identitas']);
        $sheet->setCellValue('B1' . $i, $row['Nama']);
        $sheet->setCellValue('C1'.  $i, $row['Alamat']);
        $sheet->setCellValue('D1' . $i, $row['No_Hp']);
        $sheet->setCellValue('E1' . $i, $row['Tgl_Terima']);
        $sheet->setCellValue('F1' . $i, $row['Tgl_Ambil']);
        $sheet->setCellValue('G1' . $i, $row['jenislayanan']);
    
        $no++;
    }

$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$i = $i-1;
$sheet->getStyle('A1:G'.$i)->applyFromArray($styleArray); // Mengatur gaya seluruh kolom

$writer = new Xlsx($spreadsheet);
$writer->save('Report Data Pembelian.xlsx');
?>
