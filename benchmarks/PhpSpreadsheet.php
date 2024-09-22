<?php
namespace Benchmarks;

require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Generator;

class PhpSpreadsheet
{
    // public function benchTest1(){
    //     $spreadsheet = new Spreadsheet();
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $sheet->setCellValue('A1', 'Hello World !');
    //     $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
    //     $writer->save('output/hello_world.xlsx');
    // }

    /**
     * @ParamProviders("provideFiles")
     */
    public function benchFind(array $params): void
    {
        // echo "working with ". $params['file'];
        $file = $params['file'];
        $outputDir = dirname(__DIR__) . '/output/out.csv';
        $spreadsheet = IOFactory::load($file);
        $writer = new Csv($spreadsheet);
        $writer->save($outputDir);
    }

    public function provideFiles(): Generator
    {
        $input_dir = dirname(__DIR__) . '/input';
        $files_glob = glob($input_dir . '/*');

        if (empty($files_glob)) {
            throw new \RuntimeException('No files found in /input directory');
        }
        
        foreach ($files_glob as $path) {
            yield basename($path) => [
                'file' => $path
            ];
        }
    }
}