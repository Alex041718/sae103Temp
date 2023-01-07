

<?php

// Ouverture du fichier d'entrée en lecture seule
$input_file = fopen('../ressources_client/Textes/Bretagne.txt', 'r');

// Création du fichier de sortie en écriture seule
$output_file = fopen('../dataExtracted/Bretagne/Bretagne_texte.dat', 'w');

// Déclaration des variables pour stocker l'état de lecture et le titre
$inside_text = false;
$title_placed = false;
$title = '';
$line = '';

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
            fwrite($output_file, $title . "\n");
            $title_placed = true;
        }
        fwrite($output_file, $line);
        
    }
}

// Fermeture des fichiers
fclose($input_file);
fclose($output_file);

?>
