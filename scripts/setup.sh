#!/usr/bin/env bash

ROOT_PATH=`dirname $(cd $(dirname $0); pwd)../`

cd ${ROOT_PATH}

if [ ! -e .env ]; then
    cp .env-sample .env
fi