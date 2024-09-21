<?php
namespace Benchmarks;

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class PhpSpreadsheet
{
    public function benchTest1(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('output/hello_world.xlsx');
    }
}