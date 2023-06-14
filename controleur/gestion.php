<?php

require_once("../modele/connexion.php");
require_once("../modele/articleDAO.php");
require_once("../modele/clientDAO.php");
require_once("../modele/enseigneDAO.php");
require_once("../modele/retourByArticleDAO.php");
require_once("../modele/retourDAO.php");
require_once("../modele/statutDAO.php");
require_once("../modele/motifDAO.php");
session_start();

if (isset($_SESSION['login']) && $_SESSION['login']=="root" ) {
    $message_Enseigne = "";
    $message_Statut = "";
    $message_Motif = "";


    $erreurs = [
        'id_ens' => "", 'nomEns' => "",
        'id_statut' => "", 'nomStatut' => "",
        'id_motif' => ""
    ];


    // les options des enseigne
    
        $enseigne = new EnseigneDAO();
        $lesEns   = $enseigne->getAll();
        $lignes   = [];
        foreach ($lesEns as $ens) {
            $ch = '';
            $ch .= '<option value=' . $ens->getId_ens() . '>' . $ens->getNom_ens() . '</option>';
            $lignes[] = "<tr>$ch</tr>";
        }

    //effacer une enseigne  

        $id_ens = isset($_GET['select_id_ens']) ? $_GET['select_id_ens'] : null;
        $effacerEns = isset($_GET['effacerEns']) ? $_GET['effacerEns'] : null;
        
    if ($effacerEns) {
        if (is_numeric($id_ens)) {
            $lesEns = $enseigne->desactiverEnseigne($id_ens);
            header("refresh:0;url=gestion.php");
        } else $erreurs["id_ens"] = "Il faut choisir une enseigne !";
    }

    // ajouter une enseigne 
$nomEns = isset($_GET['nomEns']) ? strip_tags(trim($_GET['nomEns'])) : null;
$ajouterEns = isset($_GET['ajouterEns']) ? $_GET['ajouterEns'] : null;



if ($ajouterEns) {
    if ($nomEns && strlen($nomEns) > 1) {
        $lesEns = $enseigne->existeByNom_ens($nomEns);
        $existeEnseigneNotActif = $enseigne->existeEnseigneNotActif($nomEns);
        $message_Enseigne=$nomEns." a été ajoutée avec succès";
        


        if (!$lesEns) {
            $lesEns = $enseigne->insert($nomEns);
            header("refresh:1;url=gestion.php");
            

        } elseif ($existeEnseigneNotActif) {
            $lesEns = $enseigne->activerEns($nomEns);
            header("refresh:0;url=gestion.php");
        } else {
            $erreurs["nomEns"] = "Enseigne déjà existante !";
            echo "<script>alert('" . $erreurs["nomEns"] . "');</script>";
        }
    } else {
        if ($nomEns === "") {
            $erreurs["nomEns"] = "Le nom de cette enseigne ne peut pas être vide !";
            echo "<script>alert('" . $erreurs["nomEns"] . "');</script>";
        } else {
            $erreurs["nomEns"] = "Il faut saisir le nom de l'enseigne !";
            echo "<script>alert('" . $erreurs["nomEns"] . "');</script>";
        }
    }
}

// les option des status
$statut = new StatutDAO();
$lesStatut = $statut->getAll();
$rows = [];
foreach ($lesStatut as $row) {
    $ch = '';
    $ch .= '<option value=' . $row->getId_statut() . '>' . $row->getLabel() . '</option>';
    $rows[] = "<tr>$ch</tr>";
}

// effacer un statut
$id_statut = isset($_GET['select_id_statut']) ? $_GET['select_id_statut'] : null;
$effacerStatut = isset($_GET['effacerStatut']) ? $_GET['effacerStatut'] : null;

if ($effacerStatut) {
    if (is_numeric($id_statut)) {
        $lesStatut = $statut->desactiverStatut($id_statut);
        header("refresh:0;url=gestion.php");
    } else $erreurs["id_statut"] = "Il faut choisir une enseigne !";
}

// ajouter un statut 
$nomStatut = isset($_GET['nomStatut']) ? strip_tags(trim($_GET['nomStatut'])) : null;
$ajouterStatut = isset($_GET['ajouterStatut']) ? $_GET['ajouterStatut'] : null;

if ($ajouterStatut) {
    if ($nomStatut && strlen($nomStatut) > 1) {
    
        $lesStatut = $statut->existeByLabel($nomStatut);
        $existeLabelNotActif = $statut->existeLabelNotActif($nomStatut);
        $message_Statut = "Ajout effectué avec succès";

        if (!$lesStatut ) {
            $lesStatut = $statut->insert($nomStatut);
            header("refresh:1;url=gestion.php");
        }
        
        if ($existeLabelNotActif){
            $lesStatut = $statut->activerStatut($nomStatut);
            header("refresh:0;url=gestion.php");
        }else if ($lesStatut && !$existeLabelNotActif) $erreurs["nomStatut"] = " statut déjà existant ! ";
    } else $erreurs["nomStatut"] = "Il faut saisir un statut ! ";
}

// les option des motif
$motif = new MotifDAO();
$lesMotifs = $motif->getAll();
$rowsMotifs = [];
foreach ($lesMotifs as $row) {
    $ch = '';
    $ch .= '<option value=' . $row->getId_motif() . '>' . $row->getMotif() . '</option>';
    $rowsMotifs[] = "<tr>$ch</tr>";
}

// effacer un motif
$id_motif = isset($_GET['select_id_motif']) ? $_GET['select_id_motif'] : null;
$effacerMotif = isset($_GET['effacerMotif']) ? $_GET['effacerMotif'] : null;

if ($effacerMotif) {
    if (is_numeric($id_motif)) {
        $lesMotifs = $motif->desactiverMotif($id_motif);
        header("refresh:0;url=gestion.php");
    } else $erreurs["id_motif"] = "Il faut choisir un motif !";
}

//;ajouter un motif
$nomMotif = isset($_GET['nomMotif']) ? strip_tags(trim($_GET['nomMotif'])) : null;
$ajouterMotif = isset($_GET['ajouterMotif']) ? $_GET['ajouterMotif'] : null;

if ($ajouterMotif) {
    if ($nomMotif && strlen($nomMotif) > 1) {

        $lesMotif = $motif->existeByMotif($nomMotif);
        $existeMotifNotActif = $motif->existeMotifNotActif($nomMotif);
        $message_Motif="Ajout effectué avec succès";

        if (!$lesMotif) {
            $lesMotif = $motif->insert($nomMotif);
            header("refresh:1;url=gestion.php");

        }if ($existeMotifNotActif){
            $lesMotif = $motif->activerMotif($nomMotif);
            header("refresh:0;url=gestion.php");
        
        }else if ($lesMotif && !$existeMotifNotActif) $erreurs["nomMotif"] = " Motif déjà existant ! ";
        
    } else $erreurs["nomMotif"] = "Il faut saisir le motif ! ";
}

    
    


   

    require_once('../vue/gestionView.php');
} else {
    echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header("refresh:2;url=login.php");
}
