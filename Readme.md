# PHP Library Benchmarking

This project will benchmark and analyze different PHP libraries by measuring the time and memory spent reading each file in the `/input` directory. The goal is to provide insights into the performance characteristics of various PHP libraries when handling file operations.

The benchmarking process involves:

- **Time Measurement**: Recording the time taken to read each file.
- **Memory Usage**: Tracking the memory consumption during the file reading process.

These metrics help in understanding the efficiency and resource usage of different PHP libraries, aiding developers in making informed decisions when choosing libraries for their projects.

## Prerequisites

- Docker

## Setup

1. Clone the repository

2. Build the Docker image:

```BASH
./run-benchmark.sh
```

### Actually Work in progresss. In the meantime run

```BASH
vendor/bin/phpbench run --report=cli
```

#### Future work

- Properly update the `phpbench.json` file with proper outputs.
- Properly update `PhpSpreadsheet.php` to properly test different things.
