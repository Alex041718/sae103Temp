# Documentation `script.php`

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
2. Lancer autoScript.sh avec `script/autoScript.sh`

Le script bash `autoScript.sh` va exécuter le script php `script.php` pour chaque fichier texte contenu dans `./ressources_client/Textes/`

## Exemple

Exemple avec `Auvergne-Rhone-Alpes.txt` dans `./ressources_client/Textes/`

Le résultat est la création de 
* `Auvergne-Rhone-Alpes_bestComm.data`
* `Auvergne-Rhone-Alpes_stat.data`
* `Auvergne-Rhone-Alpes_text.data`

```
.
├── dataExtracted
│   ├── Auvergne-Rhone-Alpes_bestComm.data
│   ├── Auvergne-Rhone-Alpes_stat.data
│   └── Auvergne-Rhone-Alpes_text.data
├── ressources_client
│   └── Textes
│       └── Auvergne-Rhone-Alpes.txt
└── script
    ├── autoScript.sh
    └── script.php
```
