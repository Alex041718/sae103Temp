#!/bin/bash

cd shared/script
# boucle sur chaque fichier .txt dans le dossier courant
for file in ../ressources_client/Textes/*.txt
do
    # enlève l'extension .txt du nom de fichier
    filename=$(basename "$file" .txt)
    # exécute le script PHP en utilisant le nom de fichier courant comme paramètre
    codeISO=$(cat "../region.conf" | egrep ${filename} | cut -d ',' -f 1)
    echo ${filename} ${codeISO}
    php script.php "${filename}"
    
    #tr pour remplacer les " " par des - dans les nom des regions
    
done

echo "fin"

echo "php to html :"

echo La commande $(cat ../region.conf | cut -d ',' -f 2 | egrep \")
for nomRegion in $(cat ../region.conf | cut -d ',' -f 2 | egrep \")
do
    nomRegion=$(echo $nomRegion | sed 's/"//g')
    #$nomRegion = ${nomRegion//\"}
    
    if [ -e ../ressources_client/Textes/${nomRegion}.txt ]; then
    echo ${nomRegion}.txt
    
    codeISO=$(cat ../region.conf | egrep ${nomRegion} | cut -d ',' -f 1)
    echo File exists ${nomRegion} et $codeISO
    php ../pages/model.php "${codeISO}" > ../htmlGenerated/${codeISO}.html
    fi
done