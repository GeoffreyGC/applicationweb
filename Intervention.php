<?php
require_once('Connexion.php');

$message = '';

$sql2 = "SELECT nom FROM clients";
$rs_select = $pdo->prepare($sql2);
$rs_select->execute();

$sql3 = "SELECT typeintervention FROM typeinter";
$rs_select3 = $pdo->prepare($sql3);
$rs_select3->execute();

$sql4 = "SELECT * FROM contrat";
$rs_select4 = $pdo->prepare($sql4);
$rs_select4->execute();

if(isset($_POST['ajouter'])){
    
    if(isset($_POST['radiodistance'])){
    
    $var_date = $_POST['date'];
    $var_client = $_POST['client'];
    $var_user = $_POST['nomutilisateur'];
    $var_radioclient = $_POST['contrat'];
    $var_radiodistance = $_POST['radiodistance'];
    $var_temps = $_POST['temps'];
    $var_type = $_POST['type'];
    $var_desc = $_POST['description'];

        
        $rs_insert = $pdo->prepare("INSERT INTO suiviintervention (date,Client,nomUtilisateur,ssmf,distance,tmpD,temps,TypeIntervention,Description) VALUES (?,?,?,?,?,?,?,?,?)");
   
        $rs_insert->bindValue(1,$var_date,PDO::PARAM_STR);
        $rs_insert->bindValue(2,$var_client,PDO::PARAM_STR);
        $rs_insert->bindValue(3,$var_user,PDO::PARAM_STR);
        $rs_insert->bindValue(4,$var_radioclient,PDO::PARAM_STR);
        $rs_insert->bindValue(5,$var_radiodistance,PDO::PARAM_STR);
        $rs_insert->bindValue(6,$var_temps,PDO::PARAM_STR);
        $rs_insert->bindValue(7,$var_temps,PDO::PARAM_STR);
        $rs_insert->bindValue(8,$var_type,PDO::PARAM_STR);
        $rs_insert->bindValue(9,$var_desc,PDO::PARAM_STR);
        
    } 
        
    if(isset($_POST['radiosite'])){

    $var_date = $_POST['date'];
    $var_client = $_POST['client'];
    $var_user = $_POST['nomutilisateur'];
    $var_radioclient = $_POST['contrat'];
    $var_radiosite = $_POST['radiosite'];
    $var_temps = $_POST['temps'];
    $var_type = $_POST['type'];
    $var_desc = $_POST['description'];

        
        $rs_insert = $pdo->prepare("INSERT INTO suiviintervention (date,Client,nomUtilisateur,ssmf,site,tmpS,temps,TypeIntervention,Description) VALUES (?,?,?,?,?,?,?,?,?)");
   
        $rs_insert->bindValue(1,$var_date,PDO::PARAM_STR);
        $rs_insert->bindValue(2,$var_client,PDO::PARAM_STR);
        $rs_insert->bindValue(3,$var_user,PDO::PARAM_STR);
        $rs_insert->bindValue(4,$var_radioclient,PDO::PARAM_STR);
        $rs_insert->bindValue(5,$var_radiosite,PDO::PARAM_STR);
        $rs_insert->bindValue(6,$var_temps,PDO::PARAM_STR);
        $rs_insert->bindValue(7,$var_temps,PDO::PARAM_STR);
        $rs_insert->bindValue(8,$var_type,PDO::PARAM_STR);
        $rs_insert->bindValue(9,$var_desc,PDO::PARAM_STR);
    }
    
        if($rs_insert->execute()){
        
        $message = '<p class="msgGreen">Intervention enregistrée</p>';
        
        
        }else{
            $message = "<p class='msgRed'>Probleme avec l'enregistrement de l'intervention, veuillez ressayer</p>";
        }
      
}   

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Intervention à enregistrer</title>
        <link rel="stylesheet" href="css\Accueil.scss">
        <link rel="stylesheet" href="css2\menutel.css">
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
        
    
     
        
        <div class="container-fluid bg-dark p-1">
            <h3 class="col-12 text-center text-white">Contrat maintenance</h3>
        </div>
        
        <div class="row">

            
        <div class="col text-center">    
        <form action="" method="post" name="formulaire" class="bg-light">
            <p>    </p>
            <?= $message; ?>
           
            <div>
                <label for="date">Date de l'intervention :</label> <br />
                <input type="date" id="date" name="date" min='2000-01-01' max='2099-12-31' required>
            </div>
            
            </br>
            <div>
                <label for="client">Client :</label><br />
                <select id='clients' name='client' required>
                    <option disabled selected>Liste des clients</option>
            <?php
            while($donnees = $rs_select->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value="<?=$donnees['nom']?>"><?= $donnees['nom'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            <br />
            
            <div>
                <label for="nomutilisateur">Nom de l'utilisateur :</label></br>
                <input type="text" id="nomutilisateur" name='nomutilisateur' placeholder="Veuillez entrer le nom de l'utilisateur" size="32" required>
            </div>
            
            </br>
            
            <div>
                <label for="contrat">Contrat sous :</label><br />
                <select id='contrat' name='contrat' required>
                    <option disabled selected>Type de contrat</option>
            <?php
            while($donne = $rs_select4->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
            <option value="<?= $donne['contrat']?>"><?= $donne['contrat'] ;?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            
            <br />
            
            <div>
                <label for='radiointer'>Genre d'intervention :</label></br>
                <div id='radioInter' name='radioInter'>
                    <input type="checkbox" id="radio4" name="radiodistance" value= "A distance" ><label for="radio4">A distance</label><br />
                    <input type="checkbox" id="radio5" name="radiosite" value= "Sur site" ><label for="radio5">Sur site</label><br />
                </div>
            </div>
            
            <br/>
            
            <div>
                <label for="temps">Temps d'intervention (HH/MM) :</label></br>
                <input type="time" name='temps' id='temps' size="10" value="00:00"required>
            </div>
            
            <br />
            
            <div>
                <label for="client">Type d'intervention :</label><br />
                <select id='type' name='type' required>
                    <option disabled selected>Type d'intervention</option>
            <?php
            while($donnee = $rs_select3->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value="<?=$donnee['typeintervention']?>"><?= $donnee['typeintervention'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            
            <br/>
            
            <div>
                <label for="description">Description :</label><br/>
                <textarea name="description" rows="5" cols="100" placeholder="Entrer la description de l'intervention" ></textarea>
            </div>
            
            <br/>
            
            <input type="submit" name="ajouter"> <input type="reset" value="effacer" name="new">
            </br>
            </br>
            <a class="leBouton" href="Intervention.php">Nouvelle intervention</a>
            <a class="leBouton" href="index.html">Retour</a>
            <br/>
            <p>   </p>
            
        </form>
        </div>

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






