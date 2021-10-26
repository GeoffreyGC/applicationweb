<?php
require_once 'Connexion.php';
require 'fpdf/fpdf.php';

if(!empty($_POST['telecharger'])){
    
$sql = "SELECT * FROM suiviintervention WHERE IDintervention = ? ORDER BY date DESC";
$rs_select = $pdo->prepare($sql);

$var_Idinter = $_GET['id'];
$rs_select->bindValue(1,$var_Idinter,PDO::PARAM_INT);
$rs_select->execute();

$donnees = $rs_select->fetch(PDO::FETCH_ASSOC);

$date = $donnees['date'];
$client = $donnees['Client'];
$user = $donnees['nomUtilisateur'];
$contrat = $donnees['ssmf'];
$distance = $donnees['distance'];
$site = $donnees['site'];
$temps = $donnees['temps'];
$type = $donnees['TypeIntervention'];
$des = $donnees['Description'];

if($distance == null){
    $distance = "Non";
    $site = "Oui";
}else if ($site == null){
    $site = "Non";
    $distance = "Oui";
}
    // Logo
class PDF extends FPDF
{
// En-tête
function Header()
{
   
    // Logo
    $this->Image('logo.png',79,0,50);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(80);

    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);

$pdf->Ln(5);
$pdf->Cell(185,10,"Intervention",0,1,"C");
$pdf->Ln(10);

$pdf->Cell(125,10,"Date :",0,0,"C");
$pdf->Cell(1,10,"{$date}",0,1,"C");


$pdf->Cell(125,10,"Client :",0,0,"C");
$pdf->Cell(1,10,"$client",0,1,"C");

$pdf->Cell(125,10,"Utilisateur :",0,0,"C");
$pdf->Cell(1,10,"$user",0,1,"C");

$pdf->Cell(125,10,"Type de contrat :",0,0,"C");
$pdf->Cell(1,10,"$contrat",0,1,"C");

$pdf->Cell(125,10,"A distance",0,0,"C");
$pdf->Cell(1,10,"$distance",0,1,"C");

$pdf->Cell(125,10,"Sur site",0,0,"C");
$pdf->Cell(1,10,"$site",0,1,"C");

$pdf->Cell(125,10,"Temps :",0,0,"C");
$pdf->Cell(1,10,"$temps",0,1,"C");

$pdf->Cell(125,10,"Type d'intervention",0,0,"C");
$pdf->Cell(1,10,"$type",0,1,"C");

$pdf->Cell(125,10,"Description",0,0,"C");
$pdf->Cell(1,10,"$des",0,1,"C");


$pdf->Output();

}


