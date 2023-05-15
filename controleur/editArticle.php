<?php
session_start();
require_once('../modele/articleDAO.php');

 echo $id_retour = isset($_GET['id_retour']) ? $_GET['id_retour'] : null;
echo "<pre>";
var_dump($id_retour);
 ////////

echo $nom_article = isset($_GET['nom_article']) ? $_GET['nom_article'] : null;
echo "<pre>";

echo $quantite = isset($_GET['quantite']) ? $_GET['quantite'] : null;
echo "<pre>";


echo $montant_piece = isset($_GET['montant_piece']) ? $_GET['montant_piece'] : null;
echo "<pre>";

echo $id_motif = isset($_GET['id_motif']) ? $_GET['id_motif'] : null;
echo "<pre>";
$valider = isset($_GET['valider']) ? $_GET['valider'] : null;
$annuler = isset($_GET['annuler']) ? $_GET['annuler'] : null;
print_r($id_motif);

if($valider){
    require_once('../modele/articleClass.php');
    $article = new Article(1,$nom_article,$montant_piece,
    $quantite,$id_motif,$id_retour);
    echo "<pre>";
    print_r($article);
    echo "<pre>"; 
    print_r($id_retour);
    var_dump($id_retour);
	
	require_once('../modele/articleDAO.php');
	$articleDAO = new ArticleDAO();
	$articleDAO ->insert($article);

	header("location: retourAdmin.php");
}
if(isset($_GET['annuler']))	{
	header("location: retourAdmin.php");
}


////////
require_once('../modele/motifDAO.php');
require_once('../modele/motifClass.php');



$motif = new MotifDAO();
	$lesMotifs = $motif->getAll();
	$columns = [];
	foreach ($lesMotifs as $column) {
		$ch = '';
		$ch .= '<option value=' . $column->getId_motif() . '>' . $column->getMotif() . '</option>';
		$columns[] = "<tr>$ch</tr>";
	}

require_once("../vue/editArticle.view.php");
?>