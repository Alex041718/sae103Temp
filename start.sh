#!/bin/bash

if [ ! -e script ]
then
    echo error
    exit -1
fi

docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-php bash shared/script/autoScript.sh



for codeISO in $(cat region.conf | cut -d ',' -f 1 | egrep FR)
do
    sudo docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-qrcode qrencode -o shared/qrcodes/$codeISO.png “https://bigbrain.biz/$codeISO”

done

