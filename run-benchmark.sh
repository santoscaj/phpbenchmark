#!/bin/bash
# Easy way to run the benchmark script

IMAGE_NAME=php-benchmark
IMAGE_VERSION_TAG=v1

# Create image if it doesnt exist
if [[ "$(docker images -q $IMAGE_NAME:$IMAGE_VERSION_TAG 2> /dev/null)" == "" ]]; then
  docker build . -t "$IMAGE_NAME:$IMAGE_VERSION_TAG"
fi

# If command provided in $1 then run command
if [ ! -z "$1" ]; then
  docker run --rm -it -v ${PWD}:/app $IMAGE_NAME:$IMAGE_VERSION_TAG $1
else 
  docker run --rm -v ${PWD}:/app $IMAGE_NAME:$IMAGE_VERSION_TAG
fi