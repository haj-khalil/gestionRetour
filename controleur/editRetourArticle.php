<?php

require_once("../modele/connexion.php");
require_once("../modele/articleDAO.php");
require_once("../modele/clientDAO.php");
require_once("../modele/enseigneDAO.php");
require_once("../modele/retourByArticleDAO.php");
require_once("../modele/retourDAO.php");
require_once("../modele/statutDAO.php");

session_start();
if (isset($_SESSION['login'])){
    if ((time() - $_SESSION['last_login']) > 900 && $_SESSION['login'] != "root") {
        echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
        header("refresh:3;url=login.php");
}else
	
$op = (isset($_GET['op']) ? $_GET['op'] : null);
$ajout = ($op == 'a');
$modif = ($op == 'm');
$suppr = ($op == 's');
$id_client = (isset($_GET['id_client']) ? $_GET['id_client'] : null);
$editid_client = ($modif&&$id_client);
$titre = (($ajout)?'Nouveau Retour':(($modif)?"Retour - édition des informations":null));

if (($id_client != null && $ajout) || (($id_client == null) && ($modif || $suppr))) {
    header("location: ../controleur/retourAdmin.php");
}

$ens = new EnseigneDAO();
$lesEns = $ens->getAll();
$lignes = [];
foreach ($lesEns as $ens) {
    $ch = '';
    $ch .= '<option value=' . $ens->getId_ens() . '>' . $ens->getNom_ens() . '</option>';
    $lignes[] = "<tr>$ch</tr>";
}

// les option des status
$statut = new StatutDAO();
$lesStatut = $statut->getAll();
$rows = [];
foreach ($lesStatut as $row) {
    $ch = '';
    $ch .= '<option value=' . $row->getId_statut().'>' . $row->getLabel() . '</option>';
    $rows[] = "<tr>$ch</tr>";
}

// gestion des zones non modifiables en mode "modif"
$valeurs['id_client'] = null;
$unRetourDAO = new RetourDAO();
if ($modif || $editid_client) {
    $valeurs['id_client'] = $id_client;
    $unRetour = $unRetourDAO->getById($id_client);
}


$erreurs = ['id_client'=>"", 'statut'=>"", 'enseigne'=>"", 'date_achat'=>"", 'date_remb'=>"", 'date_envoi'=>""];
$valeurs = ['id_client' => null, 'statut' => null, 'date_achat' => null, 'id_ens'=> null];
if($_SESSION['login'] === "root"){
$valeurs['id_client'] = (isset($_POST['id_client']) ? trim($_POST['id_client']) : 1);
}else $valeurs['id_client'] =  $_SESSION['id'];
$valeurs['enseigne'] = (isset($_POST['id_ens']) ? trim($_POST['id_ens']) : 1);
$valeurs['statut'] = (isset($_POST['select_id_statut']) ? trim($_POST['select_id_statut']) : 1);
$valeurs['date_achat'] = (isset($_POST['date_achat']) ? trim($_POST['date_achat']) : '2000-01-01');
$valeurs['date_envoi'] = (isset($_POST['date_envoi']) ? trim($_POST['date_envoi']) : '2002-01-01');



$retour = false;

if (isset($_POST['Valider']))
 {
	

	// Vérifier si l'id client est renseigné et valide
// 	if($ajout){

// 	if (!isset($valeurs['id_client']) || strlen(trim($valeurs['id_client'])) == 0) {
// 		$erreurs['id_client'] = 'Saisie obligatoire du numéro client.';
// 	} elseif (!is_numeric(trim($valeurs['id_client']))) {
// 		$erreurs['id_client'] = 'Numéro client non valide.';
// 	}
// }
	// Vérifier si le statut est renseigné
	if (!isset($valeurs['statut']) || strlen(trim($valeurs['statut'])) == 0) { 
		$erreurs['statut'] = 'Saisie obligatoire du statut.'; 
	}
	
	// Vérifier si la date d'achat est renseignée et valide
	if (!isset($valeurs['date_achat']) || strlen(trim($valeurs['date_achat'])) == 0) {
		$erreurs['date_achat'] = 'Saisie obligatoire de la date d\'achat.';
	} else {
		$dateAchat = DateTime::createFromFormat('Y-m-d', trim($valeurs['date_achat']));
		$today = new DateTime();
		
		if (!$dateAchat) {
			$erreurs['date_achat'] = 'Date d\'achat non valide.';
		} elseif ($dateAchat > $today) {
			$erreurs['date_achat'] = 'La date d\'achat ne peut pas être dans le futur.';
		}
	}

 	$nbErreurs = 0;
 	foreach ($erreurs as $erreur){
 		if ($erreur != "") $nbErreurs++;
 	}
	
	
 	if ($nbErreurs === 0){
		$RetourDAO = new RetourDAO();
        $unRetour = [$valeurs[0],$valeurs[1], $valeurs[2],$valeurs[3],  $valeurs[4]];
		if ($ajout)	{
			$RetourDAO->insert($unRetour);
			$retour = true;

		}	
		else {
			$RetourDAO->update($unRetour);
		}
	}
}

else if (isset($_POST['annuler']))	{
	$retour = true;
}
else if ($suppr) {
// suppression
	$RetourDAO->delete($id_client);
	$retour = true;
}
else if ($modif)	{
	$valeurs['id_client']		= $unRetour->getid_client();
	$valeurs['statut'] = $unRetour->getId_statut();		
	$valeurs['date_achat'] 	= $unRetour->getDate_achat();	
	$valeurs['date_remb'] 	= $unRetour->getDate_remboursement();		
	
}


if ($retour)
{
	header("location: retourAdmin.php");
}	

require_once('../vue/editRetourArticleView.php');
}else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header( "refresh:3;url=login.php" );
}
