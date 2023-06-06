<?php
require_once("../modele/connexion.php");
require_once("../modele/articleDAO.php");
require_once("../modele/clientDAO.php");
require_once("../modele/enseigneDAO.php");
require_once("../modele/retourByArticleDAO.php");
require_once("../modele/retourDAO.php");
require_once("../modele/statutDAO.php");
session_start();

$op = isset($_GET['op']) ? $_GET['op'] : null;
$ajout = ($op == 'a');
$modif = ($op == 'm');
$suppr = ($op == 's');
$id_client = isset($_GET['id_client']) ? $_GET['id_client'] : null;
$id_retour = isset($_GET['id_retour']) ? $_GET['id_retour'] : null;

$edit_Retour = ($id_retour && $modif);
$titre = $ajout ? 'Nouveau Retour' : ($modif ? 'Retour - édition des informations' : null);

if (($id_client != null && $ajout) || (($id_retour != null || $id_client == null) && ($modif || $suppr))) {
    header("location: ../controleur/retourAdmin.php");
    exit();
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

$valeurs['id_client'] = isset($_POST['id_client']) ? trim($_POST['id_client']) : null;
$valeurs['id_ens'] = isset($_POST['id_ens']) ? trim($_POST['id_ens']) : null;
$valeurs['select_id_statut'] = isset($_POST['select_id_statut']) ? trim($_POST['select_id_statut']) : null;
$valeurs['date_achat'] = isset($_POST['date_achat']) ? trim($_POST['date_achat']) : '2000-01-01';
$valeurs['date_envoi'] = isset($_POST['date_envoi']) ? trim($_POST['date_envoi']) : '2002-01-01';

$retour = false;

$erreurs = [
    'id_client' => "",
    'select_id_statut' => "",
    'id_ens' => "",
    'date_achat' => "",
    'date_envoi' => "",
];

if (isset($_POST['Valider'])) {
    $erreurs = array();

    if (empty($valeurs['id_client'])) {
        $erreurs['id_client'] = 'Choix obligatoire du Nom client';
    }
    if (empty($valeurs['select_id_statut'])) {
        $erreurs['select_id_statut'] = 'Choix obligatoire du Statut';
    }
    if (empty($valeurs['id_ens'])) {
        $erreurs['id_ens'] = 'Choix obligatoire de l\'enseigne';
    }
    if (empty($valeurs['date_achat'])) {
        $erreurs['date_achat'] = 'Saisie obligatoire de la date d\'achat.';
    }

    $nbErreurs = count(array_filter($erreurs));
    if ($nbErreurs === 0) {
        $RetourDAO = new RetourDAO();
        $unRetour = [
            "id_client" => $valeurs['id_client'],
            "date_achat" => $valeurs['date_achat'],
            "date_envoi" => $valeurs['date_envoi'],
            "id_ens" => (int) $valeurs['id_ens'],
            "id_statut" => (int) $valeurs['select_id_statut']
        ];
        if ($ajout) {
            $RetourDAO->insert($unRetour);
            $retour = true;
        } else if ($modif) {
            $RetourDAO->update($unRetour);
            $retour = true;
        }
    }
}

if ($modif) {
    $RetourDAO = new RetourDAO();
    $unRetour = $RetourDAO->getById($id_client); // Récupère les informations du retour à modifier
    if ($unRetour != null) {
        $valeurs['id_client'] = $unRetour->getId_client();
        $valeurs['select_id_statut'] = $unRetour->getId_statut();
        $valeurs['id_ens'] = $unRetour->getId_ens();
        $valeurs['date_achat'] = $unRetour->getDate_achat();
        $valeurs['date_envoi'] = $unRetour->getDate_envoi();
    } else {
        // Gérer le cas où le retour n'est pas trouvé
    }
}

if (isset($_POST['annuler'])) {
    header("location: retourAdmin.php");
    exit();
}

if ($suppr) {
    $RetourDAO = new RetourDAO();
    $RetourDAO->delete($id_client);
    $retour = true;
}

if ($retour) {
    header("location: retourAdmin.php");
    exit();
}

require_once('../vue/editRetourArticleView.php');
?>
