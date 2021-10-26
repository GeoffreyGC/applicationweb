<?php
require_once('Connexion.php');

$message='';

$sql4 = "SELECT * FROM contrat";
$rs_select4 = $pdo->prepare($sql4);
$rs_select4->execute();

$sql4m = "SELECT * FROM contrat";
$rs_select4m = $pdo->prepare($sql4m);
$rs_select4m->execute();

$sql3 = "SELECT typeintervention FROM typeinter";
$rs_select3 = $pdo->prepare($sql3);
$rs_select3->execute();

$sql3m = "SELECT typeintervention FROM typeinter";
$rs_select3m = $pdo->prepare($sql3m);
$rs_select3m->execute();

$sql2 = "SELECT nom FROM clients";
$rs_select2 = $pdo->prepare($sql2);
$rs_select2->execute();

$sql2m = "SELECT nom FROM clients";
$rs_select2m = $pdo->prepare($sql2m);
$rs_select2m->execute();

if(isset($_POST['modif'])){
    
    if(isset($_POST['radiodistance'])){
        
    $sql2 = "UPDATE suiviintervention SET date = ?, Client = ?, nomUtilisateur = ?, ssmf = ?, distance = ?, site = ?, tmpD = ?, tmpS = ?, temps = ?, TypeIntervention = ?, Description = ? WHERE IDintervention = ?";
    $rs_modif = $pdo->prepare($sql2);
   
    $var_date = $_POST['date'];
    $var_client = $_POST['client'];
    $var_user = $_POST['nomutilisateur'];
    $var_contrat = $_POST['contrat'];
    $var_radiodistance = $_POST['radiodistance'];
    $var_site = null;
    $var_tmpD = $_POST['temps'];
    $var_tmpS = null;
    $var_temps = $_POST['temps'];
    $var_type = $_POST['type'];
    $var_desc = $_POST['description'];
    $var_interID = $_POST['ID'];
    
    $rs_modif->bindValue(1,$var_date,PDO::PARAM_STR);
    $rs_modif->bindValue(2,$var_client,PDO::PARAM_STR);
    $rs_modif->bindValue(3,$var_user,PDO::PARAM_STR);
    $rs_modif->bindValue(4,$var_contrat,PDO::PARAM_STR);
    $rs_modif->bindValue(5,$var_radiodistance,PDO::PARAM_STR);
    $rs_modif->bindValue(6,$var_site,PDO::PARAM_STR);
    $rs_modif->bindValue(7,$var_tmpD,PDO::PARAM_STR);
    $rs_modif->bindValue(8,$var_tmpS,PDO::PARAM_STR);
    $rs_modif->bindValue(9,$var_temps,PDO::PARAM_STR);
    $rs_modif->bindValue(10,$var_type,PDO::PARAM_STR);
    $rs_modif->bindValue(11,$var_desc,PDO::PARAM_STR);
    $rs_modif->bindValue(12,$var_interID,PDO::PARAM_INT);
    
    if($rs_modif->execute()){
    
    $message = '<p class="msgGreen">Intervention modifiée</p>';
    }else{
        $message = '<p class="msgRed">Un problème est survenue lors de la modification</p>';
    }
    }
    
    if(isset($_POST['radiosite'])){
        
    $sql2 = "UPDATE suiviintervention SET date = ?, Client = ?, nomUtilisateur = ?, ssmf = ?, distance = ?, site = ?, tmpD = ?, tmpS = ?, temps = ?, TypeIntervention = ?, Description = ? WHERE IDintervention = ?";
    $rs_modif = $pdo->prepare($sql2);

    $var_date = $_POST['date'];
    $var_client = $_POST['client'];
    $var_user = $_POST['nomutilisateur'];
    $var_contrat = $_POST['contrat'];
    $var_distance = null;
    $var_radiosite = $_POST['radiosite'];
    $var_tmpD = null;
    $var_tmpS = $_POST['temps'];
    $var_temps = $_POST['temps'];
    $var_type = $_POST['type'];
    $var_desc = $_POST['description'];
    $var_interID = $_POST['ID'];
    
    $rs_modif->bindValue(1,$var_date,PDO::PARAM_STR);
    $rs_modif->bindValue(2,$var_client,PDO::PARAM_STR);
    $rs_modif->bindValue(3,$var_user,PDO::PARAM_STR);
    $rs_modif->bindValue(4,$var_contrat,PDO::PARAM_STR);
    $rs_modif->bindValue(5,$var_distance,PDO::PARAM_STR);
    $rs_modif->bindValue(6,$var_radiosite,PDO::PARAM_STR);
    $rs_modif->bindValue(7,$var_tmpD,PDO::PARAM_STR);
    $rs_modif->bindValue(8,$var_tmpS,PDO::PARAM_STR);
    $rs_modif->bindValue(9,$var_temps,PDO::PARAM_STR);
    $rs_modif->bindValue(10,$var_type,PDO::PARAM_STR);
    $rs_modif->bindValue(11,$var_desc,PDO::PARAM_STR);
    $rs_modif->bindValue(12,$var_interID,PDO::PARAM_INT);
    
    $rs_modif->execute();
    
    $message = '<p class="msgGreen">Intervention modifiée</p>';
    }
    

}

if(isset($_POST['modifm'])){
    
    if(isset($_POST['radiodistancem'])){
        
    $sql2m = "UPDATE suiviintervention SET date = ?, Client = ?, nomUtilisateur = ?, ssmf = ?, distance = ?, site = ?, tmpD = ?, tmpS = ?, temps = ?, TypeIntervention = ?, Description = ? WHERE IDintervention = ?";
    $rs_modif = $pdo->prepare($sql2m);
   
    $var_date = $_POST['datem'];
    $var_client = $_POST['clientm'];
    $var_user = $_POST['nomutilisateurm'];
    $var_contrat = $_POST['contratm'];
    $var_radiodistance = $_POST['radiodistancem'];
    $var_site = null;
    $var_tmpD = $_POST['tempsm'];
    $var_tmpS = null;
    $var_temps = $_POST['tempsm'];
    $var_type = $_POST['typem'];
    $var_desc = $_POST['descriptionm'];
    $var_interID = $_POST['IDm'];
    
    $rs_modif->bindValue(1,$var_date,PDO::PARAM_STR);
    $rs_modif->bindValue(2,$var_client,PDO::PARAM_STR);
    $rs_modif->bindValue(3,$var_user,PDO::PARAM_STR);
    $rs_modif->bindValue(4,$var_contrat,PDO::PARAM_STR);
    $rs_modif->bindValue(5,$var_radiodistance,PDO::PARAM_STR);
    $rs_modif->bindValue(6,$var_site,PDO::PARAM_STR);
    $rs_modif->bindValue(7,$var_tmpD,PDO::PARAM_STR);
    $rs_modif->bindValue(8,$var_tmpS,PDO::PARAM_STR);
    $rs_modif->bindValue(9,$var_temps,PDO::PARAM_STR);
    $rs_modif->bindValue(10,$var_type,PDO::PARAM_STR);
    $rs_modif->bindValue(11,$var_desc,PDO::PARAM_STR);
    $rs_modif->bindValue(12,$var_interID,PDO::PARAM_INT);
    
    if($rs_modif->execute()){
    
    $message = '<p class="msgGreen">Intervention modifiée</p>';
    }else{
        $message = '<p class="msgRed">Un problème est survenue lors de la modification</p>';
    }
    }
    
    if(isset($_POST['radiositem'])){
        
    $sql2m = "UPDATE suiviintervention SET date = ?, Client = ?, nomUtilisateur = ?, ssmf = ?, distance = ?, site = ?, tmpD = ?, tmpS = ?, temps = ?, TypeIntervention = ?, Description = ? WHERE IDintervention = ?";
    $rs_modif = $pdo->prepare($sql2m);

    $var_date = $_POST['datem'];
    $var_client = $_POST['clientm'];
    $var_user = $_POST['nomutilisateurm'];
    $var_contrat = $_POST['contratm'];
    $var_distance = null;
    $var_radiosite = $_POST['radiositem'];
    $var_tmpD = null;
    $var_tmpS = $_POST['tempsm'];
    $var_temps = $_POST['tempsm'];
    $var_type = $_POST['typem'];
    $var_desc = $_POST['descriptionm'];
    $var_interID = $_POST['IDm'];
    
    $rs_modif->bindValue(1,$var_date,PDO::PARAM_STR);
    $rs_modif->bindValue(2,$var_client,PDO::PARAM_STR);
    $rs_modif->bindValue(3,$var_user,PDO::PARAM_STR);
    $rs_modif->bindValue(4,$var_contrat,PDO::PARAM_STR);
    $rs_modif->bindValue(5,$var_distance,PDO::PARAM_STR);
    $rs_modif->bindValue(6,$var_radiosite,PDO::PARAM_STR);
    $rs_modif->bindValue(7,$var_tmpD,PDO::PARAM_STR);
    $rs_modif->bindValue(8,$var_tmpS,PDO::PARAM_STR);
    $rs_modif->bindValue(9,$var_temps,PDO::PARAM_STR);
    $rs_modif->bindValue(10,$var_type,PDO::PARAM_STR);
    $rs_modif->bindValue(11,$var_desc,PDO::PARAM_STR);
    $rs_modif->bindValue(12,$var_interID,PDO::PARAM_INT);
    
    $rs_modif->execute();
    
    $message = '<p class="msgGreen">Intervention modifiée</p>';
    }
    

}

if(isset($_GET['id'])) {
$sql = "SELECT * FROM suiviintervention WHERE IDintervention = ?";
$rs_select = $pdo->prepare($sql);

$var_Idinter = $_GET['id'];
$rs_select->bindValue(1,$var_Idinter,PDO::PARAM_INT);
$rs_select->execute();

$donnees = $rs_select->fetch(PDO::FETCH_ASSOC);
$date = $donnees['date'];
$nu = $donnees['nomUtilisateur'];
$temps = $donnees['temps'];
$desc = $donnees['Description'];
} else {
    $date = "";
    $nu = "";
    $temps = "";
    $desc = "";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Modifier une intervention</title>
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
        
        <div class="pc">
        <div class="row">
            <div class="col-3 bg-white"></div>
   
   <form action="" method="post" name="formulaire" class="col-6 bg-light">
            <p>    </p>
            <?= $message; ?>
            <fieldset>
            <div>
                <label for="date">Date de l'intervention :</label> <br />
                <input type="date" id="date" name="date" value="<?= $date ;?>" required>
            </div>
            
            </br>
            <div>
                <label for="client">Client :</label><br />
                <select id='clients' name='client' required>
                    <option disabled selected>Liste des clients</option>
            <?php
            while($donnees = $rs_select2->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value=<?=$donnees['nom']?>><?= $donnees['nom'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            <br />
            
            <div>
                <label for="nomutilisateur">Nom de l'utilisateur :</label></br>
                <input type="text" id="nomutilisateur" name='nomutilisateur' value="<?= $nu ;?>" size="32" required>
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
                <input type="time" name='temps' id='temps' size="10" value="<?= $temps ;?>"required>
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
                <textarea name="description" rows="5" cols="100" value="<?= $desc ;?>" ></textarea>
            </div>
            
            <br/>
            <input type="hidden" name="ID" value="<?= $_GET['id'] ?>">
            <input type="submit" name="modif" value="Modifier"> <input type="reset" value="effacer" name="new">
            </br>
            </br>
            <a class="leBouton" href="Intervention.php">Nouvelle intervention</a>
            <a class="leBouton" href="ListeIntervention.php">Retour</a>
            <br/>
            <p>   </p>
            </fieldset>
        </form>
        <div class="col-3 bg-white"></div>
        </div>
        </div>
        
        <div class="mobile">
        <div class="row text-center">
   
   <form action="" method="post" name="formulaire" class="col bg-light text-center">
            <p>    </p>
            <?= $message; ?>
            <fieldset>
            <div>
                <label for="datem">Date de l'intervention :</label> <br />
                <input type="date" id="date" name="datem" value="<?= $date ;?>" required>
            </div>
            
            </br>
            <div>
                <label for="clientm">Client :</label><br />
                <select id='clients' name='clientm' required>
                    <option disabled selected>Liste des clients</option>
            <?php
            while($donnees = $rs_select2m->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value=<?=$donnees['nom']?>><?= $donnees['nom'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            <br />
            
            <div>
                <label for="nomutilisateurm">Nom de l'utilisateur :</label></br>
                <input type="text" id="nomutilisateur" name='nomutilisateurm' value="<?= $nu ;?>" size="32" required>
            </div>
            
            </br>
            
            <div>
                <label for="contratm">Contrat sous :</label><br />
                <select id='contratm' name='contratm' required>
                    <option disabled selected>Type de contrat</option>
            <?php
            while($donne = $rs_select4m->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
            <option value="<?= $donne['contrat']?>"><?= $donne['contrat'] ;?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            
            <br />
            
            <div>
                <label for='radiointerm'>Genre d'intervention :</label></br>
                <div id='radioInter' name='radioInterm'>
                    <input type="checkbox" id="radio4" name="radiodistancem" value= "A distance" ><label for="radio4">A distance</label><br />
                    <input type="checkbox" id="radio5" name="radiositem" value= "Sur site" ><label for="radio5">Sur site</label><br />
                </div>
            </div>
            
            <br/>
            
            <div>
                <label for="tempsm">Temps d'intervention (HH/MM) :</label></br>
                <input type="time" name='tempsm' id='temps' size="10" value="<?= $temps ;?>"required>
            </div>
            
            <br />
            
            <div>
                <label for="typem">Type d'intervention :</label><br />
                <select id='type' name='typem' required>
                    <option disabled selected>Type d'intervention</option>
            <?php
            while($donnee = $rs_select3m->fetch(PDO::FETCH_ASSOC)) { 
            ?> 
                    <option value="<?=$donnee['typeintervention']?>"><?= $donnee['typeintervention'] ?></option>
   
            <?php
            }
            ?>
                    
            </select>
            </div>
            
            <br/>
            
            <div>
                <label for="descriptionm">Description :</label><br/>
                <textarea name="descriptionm" rows="5" cols="45" value="<?= $desc ;?>" ></textarea>
            </div>
            
            <br/>
            <input type="hidden" name="IDm" value="<?= $_GET['id'] ?>">
            <input type="submit" name="modifm" value="Modifier"> <input type="reset" value="effacer" name="new">
            </br>
            </br>
            <a class="leBouton" href="Intervention.php">Nouvelle intervention</a>
            <a class="leBouton" href="ListeIntervention.php">Retour</a>
            <br/>
            <p>   </p>
            </fieldset>
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



