<?php
require_once('../modele/clientDAO.php');
require_once('../modele/clientClass.php');
session_start();



 if (isset($_SESSION['login']) && $_SESSION["login"]=="root") {



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
            $ch .= '<td >' . $unClient->getId_client() . '</td>';
			$ch .= '<td>' . $unClient->getNom() . '</td>';
			$ch .= '<td class="'.$unClient->getPrenom().'"id="'.$unClient->getPrenom().     '">' . $unClient->getPrenom() . '</td>';
			$ch .= '<td class="'.$unClient->getEmail().'"id="'.$unClient->getEmail().      '">' . $unClient->getEmail() . '</td>';
			$ch .= '<td class="'.$unClient->getAddress().'"id="'.$unClient->getAddress().    '">' . $unClient->getAddress() . '</td>';
			$ch .= '<td class="'.$unClient->getTel().'"id="'.$unClient->getTel().        '">' . $unClient->getTel() . '</td>';
			$ch .= '<td><a href="../controleur/retourAdmin.php?EmailClient='.  $unClient->getEmail(). '"><img src="../vue/style/visu.png"></a></td>';
			
			$ch .= '<td class="article"><a  onclick="javascript:return confirm(\'Etes-vous sûr de vouloir supprimer ? \') " id="supp" href="../controleur/client.php?op=sC&id_client='
		    . urlencode( $unClient->getId_client() )
		    . '" ><img src="../vue/style/corbeille.png"></a></td>';

			$lignes[] = "<tr>$ch</tr>";
		}
	};

	unset($lesClients);

	require_once('../vue/clientView.php');
} else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
	header("refresh:2;url=login.php");
}
