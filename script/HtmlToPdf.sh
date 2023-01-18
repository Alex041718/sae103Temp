#!/bin/bash


codeISO=$1

docker run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-html2pdf "html2pdf shared/htmlGenerated/${codeISO}.html shared/pdfGenerated/$codeISO.pdf"


