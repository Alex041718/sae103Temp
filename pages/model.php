<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="author" content="MONEGER Diane">
    <link rel="stylesheet" href="../style.css">
    <title>Modèle pages</title>
</head>
<?php
$codeISO =$argv[1];
//$codeISO ="FR-BRE";
date_default_timezone_set('Europe/Paris');
$date = date("Y-m-d H:i:s");
$conf = fopen("../region.conf",'r');
while ((!feof($conf))) {
    $line = fgets($conf);
    if (substr(trim($line), 0, 6) == $codeISO) {
        $infoRegion = str_getcsv($line);
    }
}
fclose($conf);
?>

<body>
    <section class="garde breakPage" >
        <h1><?php echo $infoRegion[1] ?></h1>
        <ul class="pres">
            <li><?php echo $infoRegion[2] ?> Habitants</li>
            <li><?php echo $infoRegion[4] ?> km²</li>
            <li><?php echo $infoRegion[3] ?> départements</li>
            <li><img src="../ressources_client/Logos/<?php echo $infoRegion[0] ?>.png"></li>
        </ul>
        <div class="date"><?php echo $date; ?></div>
    </section>

<?php
$text = fopen("../dataExtracted/" . $infoRegion[1] . "_text.data",'r');
$textArray = array();

$i = -1;
while ((!feof($text))) {
    $line = fgets($text);
    if (substr($line,0,1) == '#') {
        $i = $i + 1;
    }
    $textArray[$i][] = $line;
    
}
fclose($text);

?>
    <section class="breakPage">
        <h1>Résultats trimestriels <?php echo date("m-y"); ?></h1>
        <?php foreach($textArray as $dataText) : ?>
            <h3><?php echo substr(array_shift($dataText),1);?></h3>
            <?php foreach($dataText as $value) : ?>
            <p>
                <?php echo $value;?>
            </p>
            <?php endforeach; ?>
        <?php endforeach; ?>
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
    <section class="breakPage">
        <h1>Tableau des résultats</h1>
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
                        <?php 
                        $eCAa = ($dataProd[2]-$dataProd[4])/$dataProd[4]; //Évolution du CA en valeur absolue
                        $eCAp = (($dataProd[2]-$dataProd[4])/$dataProd[4])*100; //Évolution du CA en %age
                        ?>
                        <?php if ($eCAa > 0) { ?>
                            <td style="color: green;"><?php echo "+" . (round($eCAp,4) . "%" . " " . "+" . round($eCAa,4) . "</br>"); ?></td>
                        <?php } else { ?>
                            <td style="color: red;" ><?php echo (round($eCAp,4) . "%" . " " . round($eCAa,4) . "</br>"); ?></td>
                        <?php } ?>
                    </tr>
                    <?php endforeach; ?>
                    
                </table>
                <div class="date"><?php echo $date; ?></div>
    </section>

<?php
$comm = fopen("../dataExtracted/" . $infoRegion[1] . "_bestComm.data",'r');
$comms = array();
while ((!feof($comm))) {
    $line = fgets($comm);
    $comms = str_getcsv($line);
    
    
    
}
fclose($comm);

?>

    <section class="breakPage">
        <h1>Nos meilleurs vendeurs du trimestre</h1>
        <div id="tabPerson">
            <?php  foreach($comms as $person) : ?>
                <?php $CA = substr($person,strpos($person,'=')+1);
                $person = substr($person,1,strpos($person,'=')-1);
                ?>
                <figure class="person">
                    <img src="../ressources_client/Photos/des.svg" alt="Un des meilleurs vendeurs">
                    <div class="dataBox">
                    <figcaption><?php echo $person;?></figcaption>
                    <h4><?php echo $CA;?></h4>
                    </div>
                </figure>
            <?php endforeach; ?>
            
            </div>
            <div class="date"><?php echo $date; ?></div>
    </section>
    <section >
        <h1>Annexes des liens</h1>
        <div id="linkAnnexe">
        <h2><a href="https://bigbrain.biz/<?php echo $codeISO; ?>">Le site web</a></h2>
        <figure>
            <img src="../qrcodes/qrcode-<?php echo $codeISO; ?>.png" alt="qrcode" width="75px" height="75px">
        </figure>
        </div>
        <div class="date"><?php echo $date; ?></div>
    </section>
</body>

</html>
