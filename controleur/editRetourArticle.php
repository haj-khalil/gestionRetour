<?php
require_once("../modele/connexion.php");
require_once("../modele/articleDAO.php");
require_once("../modele/clientDAO.php");
require_once("../modele/enseigneDAO.php");
require_once("../modele/retourByArticleDAO.php");
require_once("../modele/retourDAO.php");
require_once("../modele/statutDAO.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();
if (isset($_SESSION['login'])) {
if (isset($_SESSION['login'])) {
    if ((time() - $_SESSION['last_login']) > 900 && $_SESSION['login'] != "root") {
        echo '<h2 style="text-align: center;">La session a expiré !</h2>';
        header("refresh:3;url=login.php");
        exit();
    }
} else {
    echo "<h2 style='text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header("refresh:3;url=login.php");
    exit();
}

$op = isset($_GET['op']) ? $_GET['op'] : null;
$ajout = ($op == 'a');
$modif = ($op == 'm');
$suppr = ($op == 's');
$id_client = isset($_GET['id_client']) ? $_GET['id_client'] : null;
$editid_client = ($id_client && $modif);
$titre = $ajout ? 'Nouveau Retour' : ($modif ? 'Retour - édition des informations' : null);

if (($id_client != null && $ajout) || (($id_client == null) && ($modif || $suppr))) {
    header("location: ../controleur/retourAdmin.php");
}

$ens = new EnseigneDAO();
$lesEns = $ens->getAll();
$lignes = [];
foreach ($lesEns as $enseigne) {
    $ch = '<option value="' . $enseigne->getId_ens() . '">' . $enseigne->getNom_ens() . '</option>';
    $lignes[] = $ch;
}

// Les options des statuts
$statut = new StatutDAO();
$lesStatut = $statut->getAll();
$rows = [];
foreach ($lesStatut as $row) {
    $ch = '<option value="' . $row->getId_statut() . '">' . $row->getLabel() . '</option>';
    $rows[] = $ch;
}

$Clients = new ClientDAO();
$lesClients = $Clients->getAll();
$Tabs = [];

foreach ($lesClients as $client) {
    $ch = '<option value="' . $client->getid_client() . '">' . $client->getNom() . ' ' . $client->getPrenom() . '</option>';
    $Tabs[] = $ch;
}

// Gestion des zones non modifiables en mode "modif"
$valeurs = [
    'id_client' => null,
    'statut' => null,
    'date_achat' => null,
    'id_ens' => null,
];

$unRetourDAO = new RetourDAO();
if ($modif || $editid_client) {
    $valeurs['id_client'] = $id_client;
    $unRetour = $unRetourDAO->getById($id_client);

    if ($unRetour !== null) {
        $valeurs['id_client'] = $unRetour->getid_client();
        $valeurs['statut'] = $unRetour->getId_statut();
        $valeurs['date_achat'] = $unRetour->getDate_achat();
        $valeurs['date_remb'] = $unRetour->getDate_remboursement();
    } else {
        echo "<h2 style='text-align: center;'>Le retour avec l'ID $id_client n'existe pas.</h2>";
        header("refresh:3;url=retourAdmin.php");
        exit();
    }
}

$erreurs = [
    'id_client' => "",
    'statut' => "",
    'enseigne' => "",
    'date_achat' => "",
    'date_remb' => "",
    'date_envoi' => "",
];

if ($_SESSION['login'] === "root") {
    $valeurs['id_client'] = isset($_POST['id_client']) ? trim($_POST['id_client']) : null;
} else {
    $valeurs['id_client'] = $_SESSION['id'];
}

$valeurs['enseigne'] = isset($_POST['id_ens']) ? trim($_POST['id_ens']) : null;
$valeurs['statut'] = isset($_POST['select_id_statut']) ? trim($_POST['select_id_statut']) : null;
$valeurs['date_achat'] = isset($_POST['date_achat']) ? trim($_POST['date_achat']) : '2000-01-01';
$valeurs['date_envoi'] = isset($_POST['date_envoi']) ? trim($_POST['date_envoi']) : '2002-01-01';
$retour = false;

if (isset($_POST['Valider'])) {
   
     if (!isset($valeurs['id_client']) || empty($valeurs['id_client'])) {
            $erreurs['id_client'] = 'Choix obligatoire du Nom client';
        
    }
    if (!isset($valeurs['statut']) || empty($valeurs['statut'])) {
        $erreurs['statut'] = 'Choix obligatoire du Statut';
    }
    if (!isset($valeurs['enseigne']) || empty($valeurs['enseigne'])) {
        $erreurs['enseigne'] = 'Choix obligatoire de l\'enseigne';
    }
    if (!isset($valeurs['date_achat']) || empty($valeurs['date_achat'])) {
        $erreurs['date_achat'] = 'Saisie obligatoire de la date d\'achat.';
    }

    $nbErreurs = count(array_filter($erreurs));
    if ($nbErreurs === 0) {
        $RetourDAO = new RetourDAO();
        $unRetour = [
            "id_client" => $valeurs['id_client'],
            "date_achat" => $valeurs['date_achat'],
            "date_envoi" => $valeurs['date_envoi'],
            "id_ens" => $valeurs['enseigne'],
            "id_statut" => $valeurs['statut']
        ];
        if (isset($ajout)) {
            $RetourDAO->insert($unRetour);
            $retour = true;
        } else {
			$RetourDAO->update($unRetour);
        } 
		// else {
        //     echo "<h2 style='text-align: center;'>Le client avec l'ID $id_client n'existe pas.</h2>";
        //     header("refresh:3;url=retourAdmin.php");
        //     exit();
        // }
    }
} elseif (isset($_POST['annuler'])) {
    header("location: retourAdmin.php");
    exit();
} elseif ($suppr) {
    // Suppression
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
