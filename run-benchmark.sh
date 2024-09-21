#!/bin/bash
# Work in progress 

docker build . -t php-benchmark
docker run --rm -v ${pwd}:/app php-benchmark