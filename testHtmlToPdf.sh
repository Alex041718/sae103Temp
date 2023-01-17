#!/bin/bash


for codeISO in $(cat region.conf | cut -d ',' -f 1 | egrep FR)
do

docker run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-html2pdf "html2pdf shared/pages/model.html shared/pdfGenerated/$codeISO.pdf"

done
