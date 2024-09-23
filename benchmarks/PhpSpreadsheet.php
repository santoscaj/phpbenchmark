<?php
namespace Benchmarks;

require_once 'vendor/autoload.php';
require 'benchmarks/Benchmark.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class PhpSpreadsheet extends Benchmark
{
    const NAME = 'PhpSpreadsheet';
    /**
     * @ParamProviders("provideFiles")
     */
    public function processFile(array $params): void
    {
        $input_file = $params['input_file'];
        $output_file = $params['output_file'];
        $spreadsheet = IOFactory::load($input_file);
        $writer = new Csv($spreadsheet);
        $writer->save($output_file);
    }
}