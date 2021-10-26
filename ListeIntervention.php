<?php
require_once('Connexion.php');

$message = '';

$sql2 = "SELECT * FROM suiviintervention ORDER BY date DESC";
$rs_select2 = $pdo->prepare($sql2);
$rs_select2->execute();

$sql2m = "SELECT * FROM suiviintervention ORDER BY date DESC";
$rs_select2m = $pdo->prepare($sql2m);
$rs_select2m->execute();

$sql = "SELECT nom FROM clients";
$rs_select = $pdo->prepare($sql);
$rs_select->execute();

$sqlm = "SELECT nom FROM clients";
$rs_selectm = $pdo->prepare($sqlm);
$rs_selectm->execute();

if(isset($_POST['barre'])){
    $nomC = $_POST['barre'];
    $sql2 = "SELECT * FROM suiviintervention WHERE Client = '{$nomC}' ORDER BY date DESC";
    $rs_select2 = $pdo->prepare($sql2);
    $rs_select2->execute();
}

if(isset($_POST['barrem'])){
    $nomC = $_POST['barrem'];
    $sql2m = "SELECT * FROM suiviintervention WHERE Client = '{$nomC}' ORDER BY date DESC";
    $rs_select2m = $pdo->prepare($sql2m);
    $rs_select2m->execute();
}

   if(isset($_POST['rechercher'])){
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $nomC = $_POST['client'];
    
    if($nomC != 1){
        if(empty($date1) || empty($date2)){
            
        $sql3 = "SELECT * FROM suiviintervention WHERE Client = '{$nomC}' ORDER BY date DESC ";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();
        
        }else{
            
        $sql3 = "SELECT * FROM suiviintervention WHERE date BETWEEN '{$date1}' AND '{$date2}' AND Client = '{$nomC}' ORDER BY date DESC ";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();}
        
    }

    else if ($nomC = 1){
  
        $sql3 = "SELECT * FROM suiviintervention WHERE date BETWEEN '{$date1}' AND '{$date2}' ORDER BY date DESC";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();
    }
   }
   
   if(isset($_POST['rechercherm'])){
    $date1 = $_POST['date1m'];
    $date2 = $_POST['date2m'];
    $nomC = $_POST['clientm'];
    
    if($nomC != 1){
        if(empty($date1) || empty($date2)){
            
        $sql3 = "SELECT * FROM suiviintervention WHERE Client = '{$nomC}' ORDER BY date DESC ";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();
        
        }else{
            
        $sql3 = "SELECT * FROM suiviintervention WHERE date BETWEEN '{$date1}' AND '{$date2}' AND Client = '{$nomC}' ORDER BY date DESC ";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();}
        
    }

    else if ($nomC = 1){
  
        $sql3 = "SELECT * FROM suiviintervention WHERE date BETWEEN '{$date1}' AND '{$date2}' ORDER BY date DESC";
        $rs_select3 = $pdo->prepare($sql3);
        $rs_select3->execute();
    }
   }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Intervention</title>
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
            
        <div class="bg-white p-3 text-white col-12 container-fluid text-center">
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
            
        <div class="pc"> 
            <div class="row">
            <form action="" method="post" name="form" class="col-3 orange p-1 text-center container-fluid">
                <p>  </p>
                <input class="" type="search" id="barre" name="barre" placeholder="client précis">
            
            </form>
            
            <form action="" method="post" name="formulaire" class="col-9 p-1 orange text-center container-fluid">
                <p>  </p>
                Client :
                <select class="" id='clients' name='client' >
                    <option selected value="1">Liste des clients</option>
            <?php
            while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value=<?=$donnees['nom']?>><?= $donnees['nom'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
                
              
                De  <input class="" type="date" id="date1" name="date1">
                
              
                à   <input class="" type="date" id="date2" name="date2">
                
            <input type="submit" name="rechercher" value="Rechercher"> <a class="leBouton container-fluid" href="ListeIntervention.php">Toutes les interventions</a>
            </form>
            </div>
        </div>
        
        <div class="mobile"> 
            <div class="row">
            <form action="" method="post" name="form" class="orange container-fluid">
                <input class="" type="search"  name="barrem" placeholder="client précis">
                </form> 
                <br/>
                <br/>
                <form action="" method="post" name="formulaire" class=" orange container-fluid">
                Client :
                <select class=""  name='clientm' >
                    <option selected value="1">Liste des clients</option>
                <?php
                    while($donnees = $rs_selectm->fetch(PDO::FETCH_ASSOC)) { 
                ?> 
                    <option value=<?=$donnees['nom']?>><?= $donnees['nom'] ?></option>
                <?php
                }
                ?>      
                </select><br/><br/>
                De  <input type="date"  name="date1m">
                à   <input type="date"  name="date2m"><br/><br/>
                <input type="submit" name="rechercherm" value="Rechercher"> <a class="leBouton container-fluid" href="ListeIntervention.php">Toutes les interventions</a>
                </form>
            </div>
        </div>
        
        <div class="container-fluid bg-dark p-1 col-12">
            <h3 class="text-center text-white container-fluid">Interventions sous maintenance</h3>
        </div>
   
        
    
           
        
        
       
         
           
           
        
        
            <?= $message ?>   
        <div class="pc">     
            
            <div class="container-fluid">  
            <div class='row'>
                <b class="col"><p>Date</p></b>
                <b class="col"><p>Client</p></b>
                <b class="col"><p>Utilisateur</p></b>
                <b class="col"><p>Type de contrat</p></b>
                <b class="col"><p>A distance</p></b>
                <b class="col"><p>Sur site</p></b>
                <b class="col"><p>Temps</p></b>
                <p class="col"></p>
                <p class="col"></p>
                <p class="col"></p>
                
                
            </div>
            </div>
            
        <?php
        if(isset($_POST['rechercher'])){
        while($donnees = $rs_select3->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="container-fluid">
                <div class="row">
                <div class="col container-fluid">
                    <p><?=$donnees['date']; ?></p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['Client']; ?> </p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['nomUtilisateur']; ?></p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['ssmf']; ?></p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['distance']; ?></p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['site']; ?></p>
                </div>
                    
                <div class="col container-fluid">
                    <p><?= $donnees['temps']; ?></p>
                </div>
                
                <a class="col" href="plusdetail.php?id=<?= $donnees['IDintervention']; ?>">Details</a><a class="col" href="ModifierIntervention.php?id=<?= $donnees['IDintervention']; ?>">Modifier</a><a class="col" href="delete.php?id=<?php echo $donnees['IDintervention']; ?>" >Supprimer</a>
            </div>
                </div>
                
        <?php
        }}else {
            while($donnees = $rs_select2->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="container-fluid">
         <div class="row">
                <div class="col ">
                    <p><?= $donnees['date']; ?></p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['Client']; ?> </p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['nomUtilisateur']; ?></p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['ssmf']; ?></p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['distance']; ?></p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['site']; ?></p>
                </div>
                    
                <div class="col">
                    <p><?= $donnees['temps']; ?></p>
                </div>
                
                <a class="col" href="plusdetail.php?id=<?= $donnees['IDintervention']; ?>">Details</a><a class="col container-fluid" href="ModifierIntervention.php?id=<?= $donnees['IDintervention']; ?>">Modifier</a><a class="col container-fluid" href="delete.php?id=<?= $donnees['IDintervention']; ?>" >Supprimer</a>
            </div>  
                </div>
        <?php
        }}
        ?>
        </div>
        <div class="mobile">     
            
            <div class="container-fluid">  
            <div class='row'>
                <b class="col-4"><p>Date</p></b>
                <b class="col"><p>Client</p></b>
                <p class="col"></p>
                <p class="col"></p>
                <p class="col"></p>
                
                
            </div>
            </div>
            
        <?php
        if(isset($_POST['rechercherm'])){
        while($donnees = $rs_select3->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="container-fluid">
                <div class="row">
                <div class="col-4 container-fluid">
                    <p><?=$donnees['date']; ?></p>
                </div>
                
                <div class="col container-fluid">
                    <p><?= $donnees['Client']; ?> </p>
                </div>
                
                <a class="col" href="plusdetail.php?id=<?= $donnees['IDintervention']; ?>">Details</a>
                
            </div>
                </div>
                
        <?php
        }}else {
            while($donnees = $rs_select2m->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <div class="container-fluid">
         <div class="row">
                <div class="col-4">
                    <p><?= $donnees['date']; ?></p>
                </div>
                
                <div class="col">
                    <p><?= $donnees['Client']; ?> </p>
                </div>

                <a class="col" href="plusdetail.php?id=<?= $donnees['IDintervention']; ?>">Details</a>
            </div>  
                </div>
        <?php
        }}
        ?>
        </div>

         

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
    ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
    crossorigin="anonymous"></script> 
    
    </body>
    
      <div class="container-fluid bg-dark">
	    <div class="row">
            <h5 class="text-white text-center">Copyright © INFOREZ</h5> </div>
        </div>  
</html>
