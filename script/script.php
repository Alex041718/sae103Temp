<?php

// Fichier d'entré présent dans "../ressources_client/Textes/"
// Génération des fichiers de sortie dans "../dataExtracted/"

// Le nom de la région qui est contenu dans notre fichier d'entré (ex: Bretagne.txt)

//$name_region = "Auvergne-Rhone-Alpes";

$name_region = $argv[1];
//$name_region = urldecode($_GET['param']);



// Ouverture du fichier d'entrée en lecture seule
$input_file = fopen("../ressources_client/Textes/" . $name_region  . ".txt", 'r');


// TEXTES

// Déclaration des variables pour stocker l'état de lecture et le titre
$inside_text = false;
$title_placed = false;
$title = '';
$line = '';


// Création du fichier de sortie pour les Textes
$name_file = "text";

$output_text_file = fopen("../dataExtracted/" . $name_region . "_" . $name_file . ".data", 'w');


// Lecture du fichier ligne par ligne
while (($line = fgets($input_file)) !== false) {
    // Si on a trouvé une ligne de début de texte, on commence à enregistrer les lignes
    if (trim($line) == 'DEBUT_TEXTE') {
        $inside_text = true;
        $title_placed = false;
        continue;
    }
    // Si on a trouvé une ligne de fin de texte, on arrête d'enregistrer les lignes
    if (trim($line) == 'FIN_TEXTE') {
        $inside_text = false;
        // On réinitialise le titre
        $title = '';
        continue;
        
    }
    // Si on a trouvé une ligne de titre ou de sous-titre, on enregistre la valeur dans la variable $title
    if (substr(trim($line), 0, 6) == 'TITRE=' || substr(trim($line), 0, 11) == 'SOUS_TITRE=') {
        $title = trim(substr($line, strpos($line, '=') + 1));
        
        continue;
        $title_placed = false;

    }
    // Si on est dans la partie de texte à enregistrer, on enregistre le titre et la ligne dans le fichier de sortie
    if ($inside_text) {
        if (!$title_placed) {
            fwrite($output_text_file, "#" . $title . "\n");
            $title_placed = true;
        }
        fwrite($output_text_file, $line);
        
    }
}

// fermeture du fichier de sortie
fclose($output_text_file);
fclose($input_file);

// STATS


// Ouverture du fichier d'entrée en lecture seule (une seconde fois)
$input_file = fopen("../ressources_client/Textes/" . $name_region  . ".txt", 'r');

// Déclaration des variables pour stocker l'état de lecture
$inside_stat = false;

$line = '';



// Création du fichier de sortie pour les Textes
$name_file = "stat";

$output_stat_file = fopen("../dataExtracted/" . $name_region . "_" . $name_file . ".data", 'w');


// Lecture du fichier ligne par ligne
while (($line = fgets($input_file)) !== false) {
    // Si on a trouvé une ligne de début de texte, on commence à enregistrer les lignes
    if (trim($line) == 'DEBUT_STATS') {
        $inside_stat = true;
        
        continue;
    }
    // Si on a trouvé une ligne de fin de texte, on arrête d'enregistrer les lignes
    if (trim($line) == 'FIN_STATS') {
        $inside_stat = false;
        
        
        continue;
        
    }
    
    // Si on est dans la partie de texte à enregistrer, on enregistre le titre et la ligne dans le fichier de sortie
    if ($inside_stat) {
        
        fwrite($output_stat_file, $line);
        
    }
}

// fermeture du fichier de sortie
fclose($output_stat_file);

// BEST_COMM

// Ouverture du fichier d'entrée en lecture seule (une seconde fois)
$input_file = fopen("../ressources_client/Textes/" . $name_region  . ".txt", 'r');

// Déclaration des variables pour stocker l'état de lecture
$inside_bestComm = false;

$line = '';



// Création du fichier de sortie pour les Textes
$name_file = "bestComm";

$output_bestComm_file = fopen("../dataExtracted/" . $name_region . "_" . $name_file . ".data", 'w');

// Lecture du fichier ligne par ligne
while (($line = fgets($input_file)) !== false) {
    // Si on a trouvé une ligne de début de texte, on commence à enregistrer les lignes
    if (substr(trim($line), 0, 10) == 'MEILLEURS:') {
        $firstLine = trim(substr($line, strpos($line, ':') + 1));

        fwrite($output_bestComm_file, $firstLine);

        $inside_bestComm = true;
        
        continue;
    }
    
    
    
}

// fermeture du fichier de sortie
fclose($output_bestComm_file);



// Fermeture du fichier d'entrée
fclose($input_file);


?>
