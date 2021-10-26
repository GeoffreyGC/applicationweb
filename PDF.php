<?php
require_once 'Connexion.php';


if(isset($_GET['id'])) {
$sql = "SELECT * FROM suiviintervention WHERE IDintervention = ? ORDER BY date DESC";
$rs_select = $pdo->prepare($sql);

$var_Idinter = $_GET['id'];
$rs_select->bindValue(1,$var_Idinter,PDO::PARAM_INT);
$rs_select->execute();

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
              
                    <b>Date :</b>
                    <?= $donnees['date']; ?>
                    <br><br>
                
                    <b>Client :</b>
                    <?= $donnees['Client']; ?>
                    <br><br>
                
                    <b>Utilisateur :</b>
                    <?= $donnees['nomUtilisateur']; ?>
                    <br><br>

                    <b>Type de contrat :</b>
                    <?= $donnees['ssmf']; ?>
                    <br><br>

                    <b>Distance :</b>
                    <?= $donnees['distance']; ?>
                    <br><br>

                    <b>Sur site :</b>
                    <?= $donnees['site']; ?>
                    <br><br>

                    <b>Temps :</b>
                    <?= $donnees['temps']; ?>
                    <br><br>
                
                    <b>Type d'intervention :</b>
                    <?= $donnees['TypeIntervention']; ?>
                    <br><br>
                
                    <b>Description :</b>
                    <?= $donnees['Description']; ?>
                    <br><br>
                
                <input class="text-center" type="submit" name="telecharger" value="Télécharger sous format pdf">
                <a class="leBouton" href="plusdetail.php?id=<?= $donnees['IDintervention']; ?>">Retour</a>
            </form>
        
     
                    
               </div>

                
        
        
    </body>
</html>