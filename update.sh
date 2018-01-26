#!/bin/sh

docker stop $(docker ps -a -q)
docker build -t my-nginx .
docker run --rm -d -p 8080:80 --name my-nginx my-nginx