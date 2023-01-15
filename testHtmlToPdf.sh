#!/bin/bash


docker run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-html2pdf "html2pdf shared/model.html shared/fichierTestFR-BRE.pdf"

