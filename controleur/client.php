<?php
require_once('../modele/clientDAO.php');
require_once('../modele/clientClass.php');
session_start();

if ((time() - $_SESSION['last_login']) > 900 && $_SESSION['login'] != "root") {
	echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
	header("refresh:3;url=login.php");

}else if (isset($_SESSION['login'])) {



	if ($_SESSION['login'] == 'root') {
		$ClientDAO = new ClientDAO;
		$lesClients = $ClientDAO->getAll();
	}


	$lesRows = [];
	if ($lesClients != []) {

		foreach ($lesClients as $unClient) {
			$ch = '';

			$ch .= '<td>' . $unClient->getId_client() . '</td>';
			$ch .= '<td>' . $unClient->getNom() . '</td>';
			$ch .= '<td>' . $unClient->getPrenom() . '</td>';
			$ch .= '<td>' . $unClient->getEmail() . '</td>';
			$ch .= '<td>' . $unClient->getAddress() . '</td>';
			$ch .= '<td>' . $unClient->getTel() . '</td>';

			$lignes[] = "<tr>$ch</tr>";
		}
	};

	unset($lesClients);

	require_once('../vue/clientView.php');
} else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
	header("refresh:2;url=login.php");
}
