#!/bin/bash

docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-qrcode qrencode -o shared/FR-BRE.png “https://bigbrain.biz/code_region”