#!/bin/bash

if [ ! -e script ]
then
    echo error
    exit -1
fi

docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-php bash shared/script/autoScript.sh