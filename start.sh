#!/bin/bash

#Verification que le dossier script qui contient les script est bien présent
if [ ! -e script ]
then
    echo "error, le dossier script n\'a pas été trouvé"
    exit -1
fi

# On éxecute notre script intitulé "autoScript.sh" qui s'occupe de la génération des 3 fichiers de données par région et ensuite de la génération des fichier HTMLs destinés à être transformé en pdf
docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-php bash shared/script/autoScript.sh


echo "qrcode :"
for codeISO in $(cat region.conf | cut -d ',' -f 1 | egrep FR)
do
    docker container run --rm -ti -v $PWD:/work/shared bigpapoo/sae103-qrcode qrencode -o shared/qrcodes/${codeISO}.png “https://bigbrain.biz/${codeISO}”

done


for file in ressources_client/Textes/*.txt
do
    # enlève l'extension .txt du nom de fichier, parce qu'on en veux pas
    nomRegion=$(basename "$file" .txt)

    codeISO=$(cat ../region.conf | egrep ${nomRegion} | cut -d ',' -f 1)

    bash script/HtmlToPdf.sh ${codeISO}


done
