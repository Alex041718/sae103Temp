<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <title>Modèle pages</title>
    </head>

    <body>
<?php
$codeISO ="FR-CVL";
$conf = fopen("../region.conf",'r');
while ((!feof($conf))) {
    $line = fgets($conf);
    if (substr(trim($line), 0, 6) == $codeISO) {
        $infoRegion = str_getcsv($line);
    }
}
fclose($conf);
?>
        <section>
            <h1><?php echo $infoRegion[1] ?></h1>
                <ul>
                    <li><?php echo $infoRegion[2] ?> Habitants</li>
                    <li><?php echo $infoRegion[4] ?></li>
                    <li><?php echo $infoRegion[3] ?></li>
                    <li><img src="../ressources_client/Logos/<?php echo $infoRegion[0] ?>.png" alt="Logo de la Région" width="50px"></li>
                </ul>
            <div style="page-break-before: always;">JJ-MM-AAAA HH:MM</div>
        </section>

<?php

$stat = fopen("../dataExtracted/" . $infoRegion[1] . "_stat.data",'r');
$prods = array();
while ((!feof($stat))) {
    $line = fgets($stat);
    if (substr($line,0,4) == 'Prod') {
        $prods[] = str_getcsv($line);
    }
    
    
}
fclose($stat);
?>


        <section>
            <h1>Résultats trimestriels XX-YYYY</h1>
                <h3>Texte d'introduction</h3>
                <p>
                    According to all known laws of aviation, there is no way a bee should be able to fly.
                    Its wings are too small to get its fat little body off the ground.
                    The bee, of course, flies anyway because bees don't care what humans think is impossible.
                    Yellow, black. Yellow, black. Yellow, black. Yellow, black.
                    Ooh, black and yellow!
                </p>
                <h3>Tableau des résultats</h3>

                <table>
                    <tr>
                        <th>Nom produit</th>
                        <th>Ventes trimestrielles</th>
                        <th>CA trimestriel</th>
                        <th>Ventes du même trimestre année précédente</th>
                        <th>CA même trimestre année précedente</th>
                        <th>Evolution CA</th>
                    </tr>
                    <?php foreach($prods as $dataProd) : ?>
                    <tr>
                        <td><?php echo $dataProd[0]; ?></td>
                        <td><?php echo $dataProd[1]; ?></td>
                        <td><?php echo $dataProd[2]; ?></td>
                        <td><?php echo $dataProd[3]; ?></td>
                        <td><?php echo $dataProd[4]; ?></td>
                        <td><?php echo "un calcul à faire"; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>
            <div style="page-break-before: always;">JJ-MM-AAAA HH:MM</div>
        </section>
        <section>
            <h1>Nos meilleurs vendeurs du trimestre</h1>
            <ul>
                <li>
                    <figure>
                        <img src="ressources_client/Photos/des.svg" alt="1er vendeur" width="50px" height="50px">
                        <figcaption>NOM Prénom, CA</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="ressources_client/Photos/jeu.svg" alt="1er vendeur" width="50px" height="50px">
                        <figcaption>NOM Prénom, CA</figcaption>
                    </figure>
                </li>
                <li>
                    <figure>
                        <img src="ressources_client/Photos/oul.svg" alt="1er vendeur" width="50px" height="50px">
                        <figcaption>NOM Prénom, CA</figcaption>
                    </figure>
                </li>
            </ul>
            <div style="page-break-before: always;">JJ-MM-AAAA HH:MM</div>
        </section>
        <section>
            <h1>Liens page fictive de la société</h1>
            <a href="https://bigbrain.biz/code_region">Le site web</a>
            <figure>
                <img src="exqr.png" alt="qrcode" width="75px" height="75px">
            </figure>
            
        </section>
    </body>
</html>
