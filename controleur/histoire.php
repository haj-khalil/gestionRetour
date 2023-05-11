<?php

require_once('../modele/retourByArticleDAO.php');
session_start();
if ((time() - $_SESSION['last_login']) > 900 && $_SESSION['login'] != "root") {
	echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
	header("refresh:3;url=login.php");
}else if(isset($_SESSION['login'])){
	
	
if ($_SESSION['login'] == 'root') {
$RetourByArticleDAO=new RetourByArticleDAO;
$lesHistoires=$RetourByArticleDAO->getHistoire();
}


$lesRows = [];
if($lesHistoires != []){
 

foreach ($lesHistoires as $uneHistoire) {
	$ch = '';

	$ch .= '<td>' . $uneHistoire['id_changement'] . '</td>';
	$ch .= '<td>' . $uneHistoire['user_id'] . '</td>';
	$ch .= '<td>' . $uneHistoire['time_date']. '</td>';
	$ch .= '<td>' . $uneHistoire["table_affecte"] . '</td>';
	$ch .= '<td>' . $uneHistoire['event_nom'] . '</td>';
	$ch .= '<td>' . $uneHistoire['detaille']. '</td>';

	$lignes[] = "<tr>$ch</tr>";
} };

unset($lesHistoires);

require_once('../vue/histoireView.php');
}else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header( "refresh:2;url=login.php" );
}