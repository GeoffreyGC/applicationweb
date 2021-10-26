<?php
require_once('Connexion.php');

$sql = 'SELECT COUNT(*) AS nombre,Client, SUM(TIME_TO_SEC(temps)) AS somme, COUNT(distance) AS distance ,COUNT(site) AS site,SUM(TIME_TO_SEC(tmpD)) AS td ,SUM(TIME_TO_SEC(tmpS)) AS ts FROM suiviintervention WHERE distance = "A distance" OR site = "Sur site" GROUP BY Client ';
$rs_select = $pdo->prepare($sql);
$rs_select->execute();

if(isset($_GET['id'])) {

$var_Nomclient = $_GET['id'];

$sqlm = "SELECT COUNT(*) AS nombre,Client, SUM(TIME_TO_SEC(temps)) AS somme, COUNT(distance) AS distance ,COUNT(site) AS site,SUM(TIME_TO_SEC(tmpD)) AS td ,SUM(TIME_TO_SEC(tmpS)) AS ts,IDintervention FROM suiviintervention WHERE Client LIKE '{$var_Nomclient}' GROUP BY Client ";
$rs_selectm = $pdo->prepare($sqlm);
$rs_selectm->execute();
}

$sql2 = 'SELECT * FROM clients';
$rs_select2 = $pdo->prepare($sql2);
$rs_select2->execute();

function foo($seconds) {
  $t = round($seconds);
  return sprintf('%02d:%02d:%02d', ($t/3600),($t/60%60), $t%60);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Statistiques des clients</title>
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
            
        <div class="bg-white text-center">
            <img src="logo.png" width="250" height="107"> </br>
        </div>
        
            <div class="pc col-12">
            <header>
        <div id="lemenu" class="col-12 container-fluid orange p-1">
           <nav class="menu">
                 <ol>
                        <li class="menu-item"><a class="text-white" href="index.html"> Accueil</a></li>
                        <li class="menu-item">
                 <a class="text-white" href="#0">Intervention à facturer</a>
                    <ol class="sub-menu">
                        <li class="menu-item"><a class="text-white" href="ListeFacturer.php">Liste des interventions à facturer</a></li>
                        <li class="menu-item"><a class="text-white" href="Facturer.php">Enregistrer une intervention à facturer</a></li>
                    </ol>
                    </li>
                <li class="menu-item">
                    <a class="text-white" href="#0">Intervention sous contrat</a>
                    <ol class="sub-menu">
                        <li class="menu-item"><a class="text-white" href="ListeIntervention.php">Liste des interventions sous contrat</a></li>
                        <li class="menu-item"><a class="text-white" href="Intervention.php">Enregistrer une intervention sous contrat</a></li>
                    </ol>
                </li>
                <li class="menu-item">
                    <a class="text-white" href="#0">Client</a>
                    <ol class="sub-menu">
                        <li class="menu-item"><a class="text-white" href="Statsclient.php">Stats des Clients</a></li>
                        <li class="menu-item"><a class="text-white" href="ListeClient.php">Liste des Clients</a></li>
                    </ol>
                </li>
                <li class="menu-item">
                    <a class="text-white" href="#0">Option</a>
                    <ol class="sub-menu">
                        <li class="menu-item"><a class="text-white" href="listetype.php">Liste des types d'interventions</a></li>
                        <li class="menu-item"><a class="text-white" href="listecontrat.php">Liste des types de contrats</a></li>
                    </ol>
                </li>
                </ol>
            </nav>

        </div>
            </header>
            </div>
            
            <div class="mobile col-12">
            <header id="navbar" class="nav">
             <a href="index.html"> Accueil</a>
             <div class="dropdown-1">
                 <button>Intervention à facturer</button>
                 <div class="content">
                     <a href="ListeFacturer.php"> Liste des interventions à facturer</a>
                     <a href="Facturer.php"> Enregistrer une intervention à facturer</a>
                 </div>
             </div>
             <div class="dropdown-2">
                 <button>Intervention sous contrat</button>
                 <div class="content">
                     <a href="ListeIntervention.php"> Liste des interventions sous contrat</a>
                     <a href="Intervention.php"> Enregistrer une intervention sous contrat</a>
                 </div>
             </div>
             <div class="dropdown-3">
                 <button>Client</button>
                 <div class="content">
                     <a href="Statsclient.php"> Stats des Clients</a>
                     <a href="ListeClient.php"> Liste des Clients</a>
                 </div>
             </div>
             <div class="dropdown-4">
                 <button>Option</button>
                 <div class="content">
                     <a href="listetype.php"> Liste des types d'interventions</a>
                     <a href="listecontrat.php"> Liste des types de contrats</a>
                 </div>
             </div>
             <a class="icon" onclick="myFunction()">&#9776;</a>
        </header>
        
        <script>
            function myFunction() {
                var x = document.getElementById("navbar");
                if (x.className === "nav") {
                    x.className += "responsive";
                } else {
                    x.className = "nav";
                }
            }
        </script>
            </div>
   
        </div>
        
        <div class="container-fluid bg-dark p-1 col-12">
            <h6 class="text-center text-white">Statistiques Clients</h6>
        </div>
        
        
        <div class="pc">
         <ul>
  
            <div class="container-fluid">
                
           <div class='row'>
                <b class="col-1"><p>     </p></b>
                <h4 class="col-3 text-center"><b><p>Nombre d'intervention</p></b></h4>
                <h4 class="col-3 text-center"><b><p>Temps</p></b></h4>
           </div>
           <div class="row">
                <b class="col-1"><p>Client</p></b>
                <b class="col-1 text-center"><p>A distance</p></b>
                <b class="col-1 text-center"><p>Sur site</p></b>
                <b class="col-1 text-center"><p>Total</p></b>
                <b class="col-1 text-center"><p>Temps à distance</p></b>
                <b class="col-1 text-center"><p>Temps sur site</p></b>
                <b class="col-1 text-center""><p>Temps total</p></b>
            </div>
            </div>
        
        
        <?php
        while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC) ) {
        ?>   
            <div class="container-fluid">    
            <div class="row">
                <div class="col-1">
                    <a class="text-center text-dark" href="DetailClient.php?id=<?= $donnees['Client']; ?>"><?= $donnees['Client'] ?></a>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= $donnees['distance']." fois" ?></p>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= $donnees['site']." fois" ?></p>
                </div>    
   
                <div class="col-1">
                    <p class="text-center"><?= $donnees['nombre']." fois" ?> </p>
                </div>

                <div class="col-1">
                    <p class="text-center"><?= foo($donnees['td']) ?></p>
                </div>

                <div class="col-1">
                    <p class="text-center"><?= foo($donnees['ts']) ?></p>
                </div>
                
                <div class="col-1">
                    <p class="text-center"><?= foo($donnees['somme']) ?></p>
                </div>
              
                </div>
            </div>
        <?php 
        }
        ?> 
            </ul>
        </div>
        
        <div class="mobile">
         <ul>
  
            <div class="container-fluid">
                
           <div class='row'>
                
                <h4 class="col text-center"><b><p>Nombre d'intervention</p></b></h4>
                
           </div>
            </div>
        
        
        <?php
        while($donnees = $rs_selectm->fetch(PDO::FETCH_ASSOC) ) {
        ?>   
            <div class="container-fluid">    
            <div class="row">
                <div class="col">
                    <b class=""><p>Client</p></b>
                    <a class="text-dark" href="DetailClient.php?id=<?= $donnees['Client']; ?>"><?= $donnees['Client'] ?></a>
                </div>
                
                <div class="col">
                    <b class=""><p>distance</p></b>
                    <p class=""><?= $donnees['distance']." fois" ?></p>
                </div>
                
                <div class="col">
                    <b class=""><p>site</p></b>
                    <p class=""><?= $donnees['site']." fois" ?></p>
                </div>    
   
                <div class="col">
                    <b class=""><p>Total</p></b>
                    <p class=""><?= $donnees['nombre']." fois" ?> </p>
                </div>
                
                <h4 class="col-12 text-center"><b><p>Temps</p></b></h4><br/><br/>

                <div class="col">
                    <b class=""><p>Temps à distance</p></b>
                    <p class=""><?= foo($donnees['td']) ?></p>
                </div>

                <div class="col">
                    <b class=""><p>Temps sur site</p></b>
                    <p class=""><?= foo($donnees['ts']) ?></p>
                </div>
                
                <div class="col">
                    <b class=""><p>Temps total</p></b>
                    <p class=""><?= foo($donnees['somme']) ?></p>
                </div>
              
                </div>
            </div>
        <?php 
        }
        ?> 
             <a class="leBouton col" href="Statsclient.php">Retour</a>
            </ul>
        </div>


       


        
        
        
        
        
        
        
    <div class="container-fluid bg-dark">
	<div class="row">
            <h5 class="text-white text-center">Copyright © INFOREZ</h5> </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script>      
    </body>
</html>


