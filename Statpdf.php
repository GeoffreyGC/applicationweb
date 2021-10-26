<?php
require_once 'Connexion.php';



$sqlm = 'SELECT COUNT(*) AS nombre,Client, SUM(TIME_TO_SEC(temps)) AS somme, COUNT(distance) AS distance ,COUNT(site) AS site,SUM(TIME_TO_SEC(tmpD)) AS td ,SUM(TIME_TO_SEC(tmpS)) AS ts,IDintervention FROM suiviintervention WHERE distance = "A distance" OR site = "Sur site" GROUP BY Client ';
$rs_selectm = $pdo->prepare($sqlm);
$rs_selectm->execute();

$sql2 = 'SELECT * FROM clients';
$rs_select2 = $pdo->prepare($sql2);
$rs_select2->execute();
$donnee = $rs_select2->fetch(PDO::FETCH_ASSOC);

function foo($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

if(isset($_GET['id'])) {
$sql = "SELECT * FROM suiviintervention WHERE Client = ? ORDER BY date DESC";
$rs_select = $pdo->prepare($sql);

$var_Idinter = $_GET['id'];
$rs_select->bindValue(1,$var_Idinter,PDO::PARAM_INT);
$rs_select->execute();

$sql3 = "SELECT COUNT(*) AS nombre,Client, SUM(TIME_TO_SEC(temps)) AS somme, COUNT(distance) AS distance ,COUNT(site) AS site,SUM(TIME_TO_SEC(tmpD)) AS td ,SUM(TIME_TO_SEC(tmpS)) AS ts FROM suiviintervention WHERE Client={'$var_Idinter'} GROUP BY Client ";
$rs_select3 = $pdo->prepare($sql3);
$rs_select3->execute();

$donne = $rs_select3->fetch(PDO::FETCH_ASSOC);
$donnees = $rs_select->fetch(PDO::FETCH_ASSOC);}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PDF</title>
        <link rel="stylesheet" href="css\Accueil.scss">
        <link rel="stylesheet" href="css2\menutel.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css\bootstrap.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
crossorigin="anonymous"/>
    </head>
    <body>
        
        <div class="row">

              
            <form action="Installerpdf.php?id=<?= $donnees['IDintervention']; ?>" method="POST" class="text-center col-12">
                <div class="bg-white text-center" name="image">
            <img src="logo.png" width="250" height="107"> </br>
                </div>
              
                <div class="col-1">
                    <p class="text-center"><?= $donne['Client'] ?></a>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= $donne['distance']." fois" ?></p>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= $donne['site']." fois" ?></p>
                </div>    
   
                <div class="col-1">
                    <p class="text-center"><?= $donne['nombre']." fois" ?> </p>
                </div>

                <div class="col-1">
                    <p class="text-center"><?= foo($donne['td']) ?></p>
                </div>

                <div class="col-1">
                    <p class="text-center"><?= foo($donne['ts']) ?></p>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= foo($donne['somme']) ?></p>
                </div>
                
                <input class="text-center" type="submit" name="telecharger" value="Télécharger sous format pdf">
                <a class="leBouton" href="Statsclient.php">Retour</a>
            </form>
        
     
                    
               </div>

                
        
        
    </body>
</html>