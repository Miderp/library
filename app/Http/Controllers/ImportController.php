<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
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
