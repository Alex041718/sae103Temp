# Documentation de script.php

## Arborescence requise

```
.
├── dataExtracted
├── ressources_client
│   └── Textes
└── script
    ├── autoScript.sh
    └── script.php
```

## Instructions

1. Placer les fichiers .txt dans `./ressources_client/Textes/`
2. Se donner le droit d'exécuter le scripts si nécessaire avec `chmod +x start.sh`
3. Lancer le script avec `./start.sh`

Le script bash start.sh va exécuter `autoScript.sh` (dans un container docker PHP) qui va exécuter le script php `script.php` pour chaque fichier texte contenu dans `./ressources_client/Textes/`

## Exemple

Exemple avec `Auvergne-Rhone-Alpes.txt` et `Bourgogne-Franche-Comté.txt` dans `./ressources_client/Textes/`

Le résultat est la création de 
* `Auvergne-Rhone-Alpes_bestComm.data`
* `Auvergne-Rhone-Alpes_stat.data`
* `Auvergne-Rhone-Alpes_text.data`

```
.
├── dataExtracted
│   ├── Auvergne-Rhone-Alpes_bestComm.data
│   ├── Auvergne-Rhone-Alpes_stat.data
│   ├── Auvergne-Rhone-Alpes_text.data
│   ├── Bourgogne-Franche-Comté_bestComm.data
│   ├── Bourgogne-Franche-Comté_stat.data
│   └── Bourgogne-Franche-Comté_text.data
├── ressources_client
│   └── Textes
│       ├── Auvergne-Rhone-Alpes.txt
│       └── Bourgogne-Franche-Comté.txt
└── script
    ├── autoScript.sh
    └── script.php
```
