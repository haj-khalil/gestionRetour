<?php
require_once("../modele/connexion.php");
require_once("../modele/articleDAO.php");
require_once("../modele/clientDAO.php");
require_once("../modele/enseigneDAO.php");
require_once("../modele/retourByArticleDAO.php");
require_once("../modele/retourDAO.php");
require_once("../modele/retourClass.php");
require_once("../modele/statutDAO.php");
session_start();


if (isset($_SESSION['login']) && $_SESSION['id_client'] && $_SESSION['login'] != "root") {

    if ((time() - $_SESSION['last_login']) > 5000) {
        echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
        header("refresh:2;url=login.php");
    } else {

        $messageInscription=false;
        $op = isset($_GET['op']) ? $_GET['op'] : null;
        $ajout = ($op == 'a');
        


        $valeurs = [
            'id_client' => null,
            'date_achat' => null,
            'date_envoi' => null,
            'date_remboursement' => null,
            'id_ens' => null,
            'select_id_statut' => null,
        ];

        $erreurs = [
            'select_id_statut' => "",
            'id_ens' => "",
            'date_achat' => "",
            'date_envoi' => "",
            'date_remboursement' => ""
        ];
        // les options des enseigne
        $ens = new EnseigneDAO();
        $lesEns = $ens->getAll();
        $lignes = [];
        foreach ($lesEns as $enseigne) {
            $ch = '<option class="option_ens" value="' . $enseigne->getId_ens() . '">' . $enseigne->getNom_ens() . '</option>';
            $lignes[] = $ch;
        }

        // Les options des statuts
        $statut = new StatutDAO();
        $lesStatut = $statut->getAll();
        $rows = [];
        foreach ($lesStatut as $row) {
            $ch = '<option class="option_statut" value="' . $row->getId_statut() . '">' . $row->getLabel() . '</option>';
            $rows[] = $ch;
        }





        $id_client= $_SESSION['id_client'];
        $id_ens = isset($_GET['id_ens']) ? trim($_GET['id_ens']) : null;
        $select_id_statut = isset($_GET['select_id_statut']) ? trim($_GET['select_id_statut']) : null;
        $date_achat = isset($_GET['date_achat']) ? trim($_GET['date_achat']) : null;
        $date_envoi = isset($_GET['date_envoi']) ? trim($_GET['date_envoi']) : null;
        $date_remboursement = isset($_GET['date_remboursement']) ? trim($_GET['date_remboursement']) : "";

        


        if (isset($_GET['Valider'])) { //??


            if ($id_client!=null) {
                $valeurs['id_client'] = $id_client;
            } 

            if (is_numeric($select_id_statut)) {
                $valeurs['select_id_statut'] = $select_id_statut;
            } else  $erreurs['select_id_statut'] = 'Choix obligatoire du Statut';

            if (is_numeric($id_ens)) {
                $valeurs['id_ens'] = $id_ens;
            } else $erreurs['id_ens'] = 'Choix obligatoire de l\'enseigne';

            if (!empty($date_achat) && $date_achat != null) {
                $valeurs['date_achat'] = $date_achat;
            } else  $erreurs['date_achat'] = 'Saisie obligatoire de la date d\'achat.';

            if (!empty($date_envoi) && $date_envoi != null) {
                $valeurs['date_envoi'] = $date_envoi;
            } else  $erreurs['date_envoi'] = 'Saisie obligatoire de la date d\'envoie.';

                $valeurs['date_remboursement'] = $date_remboursement;
            



            $nbErreurs = 0;
            foreach ($erreurs as $erreur) {
                if ($erreur != "") $nbErreurs++;
            }



            if ($nbErreurs == 0) {
                //creer un object de type Retour
                $unRetour = new Retour();
                $unRetour->setId_client($valeurs['id_client']);
                $unRetour->setDate_achat($valeurs['date_achat']);
                $unRetour->setDate_envoi($valeurs['date_envoi']);
                $unRetour->setDate_remboursement($valeurs['date_remboursement']);
                $unRetour->setId_ens($valeurs['id_ens']);
                $unRetour->setId_statut($valeurs['select_id_statut']);
                //creer un object de type RetourDAO et inserer l'object de type Retour
                $RetourDAO = new RetourDAO(); 
                $RetourDAO->insert($unRetour);
                $messageInscription=true;
                header( "refresh:2;url=retour.php" );
    


            
            }
        }
    }

    

    require_once('../vue/editRetourView.php');
    
} else {
    echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header("refresh:2;url=login.php");
}