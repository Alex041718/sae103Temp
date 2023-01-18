#!/bin/bash

# On se place dans script
cd shared/script
# Boucle sur chaque fichier .txt dans le dossier Textes, $file est affecté à chaque boucle au nom du fichier
for file in ../ressources_client/Textes/*.txt
do
    # enlève l'extension .txt du nom de fichier, parce qu'on en veux pas
    nomRegion=$(basename "$file" .txt)

    # exécute le script PHP en utilisant le nom de fichier courant comme paramètre
    # Ce script génère les trois fichier de données différentes
    php script.php "${nomRegion}"
    
    # exécute la page PHP en utilisant le nom de fichier courant comme paramètre
    # Ce script génère les fichiers HTML a partir des trois fichiers de données
    codeISO=$(cat ../region.conf | egrep ${nomRegion} | cut -d ',' -f 1)
    php ../pages/model.php "${codeISO}" > ../htmlGenerated/${codeISO}.html

    #tr pour remplacer les " " par des - dans les nom des regions
    
done

exit -1
