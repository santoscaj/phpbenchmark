# PHP Library Benchmarking

This project will benchmark and analyze different PHP libraries by measuring the time and memory spent reading each file in the `/input` directory. The goal is to provide insights into the performance characteristics of various PHP libraries when handling file operations.

The benchmarking process involves:

- **Time Measurement**: Recording the time taken to read each file.
- **Memory Usage**: Tracking the memory consumption during the file reading process.

These metrics help in understanding the efficiency and resource usage of different PHP libraries, aiding developers in making informed decisions when choosing libraries for their projects.

# Purpose

Since we're in the Discovery phase of the project, we need to understand the performance characteristics of different PHP libraries when handling file operations. This benchmarking process will help us identify the most efficient and resource-friendly libraries for our project.

## Prerequisites

- Docker

## Setup

1. Clone the repository.

2. Add your benchmarks to the `benchmarks` directory. Follow the example provided in the `PhpSpreadsheet.php` file.

3. Update your configuration in the `phpbench.json` file. Important configurations include:
   - **runner.iterations**: The number of iterations to run the benchmark.
   - **runner.revs**: The number of revolutions to run per iteration.
   - **runner.subject_pattern**: The function that will be called for the benchmark.
   - **runner.file_pattern**: The pattern to match the benchmark files.

[Complete phpbench documentation here](https://phpbench.readthedocs.io/en/latest/configuration.html#runner-subject-pattern)

**Note:** As of now the processed files are overwritten to limit the number of output files. You can change this behavior by updating the `SEPARATE_OUTPUT_PER_TEST` constant in the `benchmarks/Benchmark.php` where `true` will create a separate output directory for each test.

4. Run the report script `./run-benchmark.sh`.
   If you would like to run a different command you can run `./run-benchmark.sh <command>`, example to change the default run settings:

   ```BASH
   ./run-benchmark.sh vendor/bin/phpbench run --report=cli --revs=10 --iterations=10
   ```

5. Check results.
   - Check the processed files in the `output` directory.
   - Check the benchmarking results in the `results/chart.html` file.

#### Directory Structure

- **benchmarks**: Contains the PHP libraries to be benchmarked.
- **input**: Contains the files to be read by the PHP libraries.
- **output**: Contains the processed files by the benchmarks.
- **results**: Contains the benchmarking results containing time taken and memory usage.
