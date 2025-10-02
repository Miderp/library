<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportController extends Controller
{
    public function bukuExcel()
    {
    $bukuData = Buku::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Judul');
        $sheet->setCellValue('C1', 'Pengarang');
        $sheet->setCellValue('D1', 'Tahun Terbit');
        $sheet->setCellValue('E1', 'Jenis Buku');

        // Set data
        $row = 2;
        foreach ($bukuData as $buku) {
            $sheet->setCellValue('A' . $row, $buku->id);
            $sheet->setCellValue('B' . $row, $buku->judul);
            $sheet->setCellValue('C' . $row, $buku->pengarang);
            $sheet->setCellValue('D' . $row, $buku->tahun_terbit);
            $sheet->setCellValue('E' . $row, $buku->jenis_buku);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);

        $fileName = 'buku_export.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return Response::download($temp_file, $fileName)->deleteFileAfterSend(true);
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('excel_file');

        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip header row
        foreach (array_slice($rows, 1) as $row) {
            Buku::create([
                'judul' => $row[1],
                'pengarang' => $row[2],
                'tahun_terbit' => $row[3],
                'jenis_buku' => $row[4],
            ]);
        }

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }
}
