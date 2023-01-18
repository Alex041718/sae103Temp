#!/bin/bash

cd shared/script
# boucle sur chaque fichier .txt dans le dossier courant
for file in ../ressources_client/Textes/*.txt
do
    # enlève l'extension .txt du nom de fichier
    filename=$(basename "$file" .txt)
    # exécute le script PHP en utilisant le nom de fichier courant comme paramètre
    
    php script.php "${filename}"
    
    

    #tr pour remplacer les " " par des - dans les nom des regions
    
done



echo La commande $(cat ../region.conf | cut -d ',' -f 2 | egrep \")
for nomRegion in $(cat ../region.conf | cut -d ',' -f 2 | egrep \")
do
    # permert d'enlever les guillemets " autour du nom de la région, dans le region.conf, les noms des régions sont entouré de guillemets.
    nomRegion=$(echo $nomRegion | sed 's/"//g')
    
    
    if [ -e ../ressources_client/Textes/${nomRegion}.txt ]; then
    echo ${nomRegion}.txt
    
    codeISO=$(cat ../region.conf | egrep ${nomRegion} | cut -d ',' -f 1)
    php ../pages/model.php "${codeISO}" > ../htmlGenerated/${codeISO}.html
    fi
done