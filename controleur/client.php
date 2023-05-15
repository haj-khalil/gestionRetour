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

	///////nadime
	$op 	= (isset($_GET['op'])?$_GET['op']:null);
	$suppr = ($op == 'sC');
	$id_client = isset($_GET['id_client']) ? $_GET['id_client'] : null;
if ($suppr && !empty($id_client)&& $id_client) {
	
	// suppression
	require_once('../modele/clientDAO.php');
	$clienteDAO=new ClientDAO();
	$clienteDAO->delete($id_client);
	header("Refresh:0; url=client.php");


}	
///////nadime


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
            $ch .= '<td><a href="../controleur/retourAdmin.php?EmailClient='
			.  $unClient->getEmail()
			. '"><img src="../vue/style/visu.png"></a></td>';
			
			//n
			$ch .= '<td class="article"><a id="supp" href="../controleur/client.php?op=sC&id_client='
		    . urlencode( $unClient->getId_client() )
		    . '" ><img src="../vue/style/corbeille.png"></a></td>';
			//n

			$lignes[] = "<tr>$ch</tr>";
		}
	};

	unset($lesClients);

	require_once('../vue/clientView.php');
} else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
	header("refresh:2;url=login.php");
}
