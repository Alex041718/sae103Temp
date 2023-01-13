#!/bin/bash

cd shared/script
# boucle sur chaque fichier .txt dans le dossier courant
for file in ../ressources_client/Textes/*.txt
do
    # enlève l'extension .txt du nom de fichier
    filename=$(basename "$file" .txt)
    # exécute le script PHP en utilisant le nom de fichier courant comme paramètre
    php script.php "$filename"
  
done