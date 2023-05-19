<?php
session_start();

require_once('../modele/motifClass.php');
require_once('../modele/motifDAO.php');


$nom_article = isset($_GET['nom_article']) ? strip_tags(strval(trim($_GET['nom_article']))) : null;
$id_retour = isset($_GET['id_retour']) ? $_GET['id_retour'] : null;
$quantite = isset($_GET['quantite']) ? intval($_GET['quantite']) : null;
$montant_piece = isset($_GET['montant_piece']) ? floatval(number_format(str_replace(',', '', $_GET['montant_piece']), 2)) : null;
$id_motif = isset($_GET['id_motif']) ? intval($_GET['id_motif']) : null;
$valider = isset($_GET['valider']) ? $_GET['valider'] : null;
$annuler = isset($_GET['annuler']) ? $_GET['annuler'] : null;


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


if ($valider) {

    if (preg_match($REGEX_NOM, $nom_article) && $nom_article != null) {
        $valeurs['nom_article'] = $nom_article;
    } else $erreurs['nom_article'] = 'nom article invalid';



    if ($quantite != null && is_numeric($quantite)) {
        $valeurs['quantite'] = $quantite;
    } elseif ($quantite == null) $valeurs['quantite'] = 1;


    if ($montant_piece > 0 && $montant_piece) {
        $valeurs['montant_piece'] = $montant_piece;
    } else $erreurs['montant_piece'] = 'montant piece invalid';


    if ($id_motif) {
        $valeurs['id_motif'] = $id_motif;
    } else $erreurs['id_motif'] = 'select le motif';

    if ($id_retour) {
        $valeurs['id_retour'] = $id_retour;
    }


    $nbErreurs = 0;
    foreach ($erreurs as $erreur) {
        if ($erreur != "") $nbErreurs++;
    }

    if ($nbErreurs == 0) {
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
}
if (isset($_GET['annuler'])) {
    header("location: retourAdmin.php");
}




require_once("../vue/editArticle.view.php");
