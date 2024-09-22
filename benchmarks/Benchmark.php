<?php
namespace Benchmarks;

require_once 'vendor/autoload.php';

use Generator;

abstract class Benchmark
{
    const NAME = 'Benchmark';

    /**
     * Set to true to have each benchmark output files in a separate directory. There will be one output file per test per input file.
     * Set to false to have all output files in the same directory. There will be one output file per input file, results will overwrite each other.
     **/ 
    const SEPARATE_OUTPUT_PER_TEST = false;

    protected $output_dir;
    protected $input_dir;

    public function __construct()
    {
        $root_dir = dirname(__DIR__);
        $this->input_dir = $root_dir . '/input';
        $base_output_dir = $root_dir . '/output';

        if (self::SEPARATE_OUTPUT_PER_TEST) {
            $this->output_dir = $base_output_dir . '/' . static::NAME;
        } else {
            $this->output_dir = $base_output_dir;
        }

        // Check if the directory exists, if not, create it
        if (!is_dir($this->output_dir)) {
            mkdir($this->output_dir, 0777, true);
        }

    }

    /** 
     * Abstract method to provide files.
     * Must be implemented by subclasses.
     *
     * @return void
     */
    abstract public function benchFind( array $params): void;

    public function provideFiles(): Generator
    {
        $files_glob = glob($this->input_dir . '/*');

        if (empty($files_glob)) {
            throw new \RuntimeException('No files found in /input directory');
        }

        foreach ($files_glob as $path) {
            $file_name = basename($path);
            $output_file = $this->output_dir . '/' . $file_name . '.csv';
            yield basename($path) => [
                'input_file' => $path,
                'output_file' => $output_file
            ];
        }
    }
}