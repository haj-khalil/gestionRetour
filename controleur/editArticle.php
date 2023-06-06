<?php
session_start();

require_once('../modele/motifClass.php');
require_once('../modele/motifDAO.php');
require_once('../modele/retourClass.php');
require_once('../modele/retourDAO.php');

  
	
$nom_article = isset($_GET['nom_article']) ? strip_tags(strval(trim($_GET['nom_article']))) : null;
$id_retour = isset($_GET['id_retour']) ? $_GET['id_retour'] : null;
$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : null;
$quantite = isset($_GET['quantite']) ? intval($_GET['quantite']) : null;
$montant_piece = isset($_GET['montant_piece']) ? floatval(str_replace(',', '.', $_GET['montant_piece'])) : null;
$id_motif = isset($_GET['id_motif']) ? intval($_GET['id_motif']) : null;
$valider = isset($_GET['valider']) ? $_GET['valider'] : null;
$annuler = isset($_GET['annuler']) ? $_GET['annuler'] : null;
$op      = (isset($_GET['op']) ? $_GET['op'] : null);
$modif   = ($op == 'mA');
$edit_article = ($id_article && $modif);


    $motif = new MotifDAO();
    $lesMotifs = $motif->getAll();
    $columns = [];
    foreach ($lesMotifs as $column) {
        $ch = '';
        $ch .= '<option value=' . $column->getId_motif() . '>' . $column->getMotif() . '</option>';
        $columns[] = "<tr>$ch</tr>";
    }


    $valeurs = [
        'id_retour' => null,
        'nom_article' => null,
        'quantite' => null,
        'montant_piece' => null,
        'id_motif' => null
    ];

    $erreurs = [
        'id_retour' => "",
        'nom_article' => '',
        'quantite' => "",
        'montant_piece' => "",
        'id_motif' => ""
    ];

$REGEX_NOM = "/^[a-zA-Z]{2,25}$/";
//$REGEX_QUANTITE = "/^([1-9]|[1-9][0-9]{1,5}|10000)(\.[0-9]+)?$/";
/* $REGEX_MONTANT = "/^(?:\p{Sc}\s*)?([1-9]\d*|0)(?:\.\d{1,2})?(?:\s*\p{Sc})?$/"; */

if ($valider && $id_retour) {

        if (preg_match($REGEX_NOM, $nom_article) && $nom_article != null) {
            $valeurs['nom_article'] = $nom_article;
        } else $erreurs['nom_article'] = 'Nom article invalide';



        if ($quantite != null && is_numeric($quantite)) {
            $valeurs['quantite'] = $quantite;
        } elseif ($quantite == null) $valeurs['quantite'] = 1;

    if ($montant_piece > 0 && $montant_piece) {
        $valeurs['montant_piece'] = $montant_piece;
    } elseif ($montant_piece != null && !$annuler) {
        $erreurs['montant_piece'] = 'Montant piece invalide';
    }
    
    

    if ($id_motif) {
        $valeurs['id_motif'] = $id_motif;
    } else $erreurs['id_motif'] = 'Selectionnez un motif';

    if ($id_retour) {
            $valeurs['id_retour'] = $id_retour;
    
        }


        $nbErreurs = 0;
        foreach ($erreurs as $erreur) {
            if ($erreur != "") $nbErreurs++;
        }

    if ($nbErreurs == 0 && $id_retour) {
        require_once('../modele/articleClass.php');
        $article = new Article(
            1,
            $valeurs['nom_article'],
            $valeurs['montant_piece'],
            $valeurs['quantite'],
            $valeurs['id_motif'],
            $valeurs['id_retour']
        );


        require_once('../modele/articleDAO.php');
        $articleDAO = new ArticleDAO();
        $articleDAO->insert($article);
        $erreurs = [];
        header("location: retourAdmin.php");
    }
    if($annuler){
        header("location: retourAdmin.php");
    }
}

require_once('../modele/articleDAO.php');
require_once('../modele/articleClass.php');
$valeurs['id_article'] = null;
$unArticleDAO = new ArticleDAO();
if ($modif || $edit_article) {
    $valeurs['id_article'] = $id_article;
    $unArticle = $unArticleDAO->getByIdArticle($id_article);
}

if($modif){
    $valeurs['id_article']		= $unArticle->getId_article();
    $valeurs['nom_article'] = $unArticle->getNom_article();		
	$valeurs['montant_piece'] 	= $unArticle->getMontant_piece();
    $valeurs['quantite'] = $unArticle->getQuantite();	
	$valeurs['id_motif'] 	= $unArticle->getId_motif();
   

}

if ($valider && $id_article) {

    if (preg_match($REGEX_NOM, $nom_article) && $nom_article != null) {
        $valeurs['nom_article'] = $nom_article;
    } else $erreurs['nom_article'] = 'Veillez entrer un nom valide';



    if ($quantite != null && is_numeric($quantite)) {
        $valeurs['quantite'] = $quantite;
    } elseif ($quantite == null) $valeurs['quantite'] = 1;

    if ($montant_piece > 0 && $montant_piece) {
        $valeurs['montant_piece'] = $montant_piece;
    } elseif ($montant_piece != null && !$annuler) {
        $erreurs['montant_piece'] = 'Veillez entrer un monatant valide';
    }
    
    

    if ($id_motif) {
        $valeurs['id_motif'] = $id_motif;
    } else $erreurs['id_motif'] = 'Selectionnez un motif';

    if ($id_article) {
        $valeurs['id_article'] = $id_article;
    }


    $nbErreurs = 0;
    foreach ($erreurs as $erreur) {
        if ($erreur != "") $nbErreurs++;
    }

    if ($nbErreurs == 0 && $id_article) {
        require_once('../modele/articleClass.php');
        $article = new Article(
            1,
            $valeurs['nom_article'],
            $valeurs['montant_piece'],
            $valeurs['quantite'],
            $valeurs['id_motif']
            
        );


    require_once('../modele/articleDAO.php');
    $articleDAO = new ArticleDAO();
    $articleDAO->update(
        $id_article,
        $nom_article ,
        $montant_piece,
        $quantite,
        $id_motif
    );
    $erreurs = [];
    header("location: retourAdmin.php");
}}

if (isset($_GET['annuler'])) {
    header("location: retourAdmin.php");
}


require_once("../vue/editArticle.view.php");
