<?php
session_start();
if (isset($_SESSION['login'])){
    if ((time() - $_SESSION['last_login']) > 000 && $_SESSION['login'] != "root") {
        echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
        header("refresh:3;url=login.php");
}else
	

    require_once('../modele/retourByArticleDAO.php');
    $isAdmin = false;
    if ($_SESSION['login'] == 'root') {
        $isAdmin = true;
    }
    if (!$isAdmin) {
        $retourByArticleDAO = new RetourByArticleDAO();
        $montantTotaleRembourse = isset($retourByArticleDAO->getMontantRetoursById_clientEtLabel(intval($_SESSION['id_client']), 'Retour remboursé')[0]["total"]) ?
            $retourByArticleDAO->getMontantRetoursById_clientEtLabel(intval($_SESSION['id_client']), 'Retour remboursé')[0]["total"] : 0;


        $montantTotaleEnAttente = isset($retourByArticleDAO->getMontantRetoursById_clientEtLabelEnAttente(intval($_SESSION['id_client']), 'Retour remboursé')[0]["total"]) ?
            $retourByArticleDAO->getMontantRetoursById_clientEtLabelEnAttente(intval($_SESSION['id_client']), 'Retour remboursé')[0]["total"] : 0;
    }

    require_once('../vue/menuView.php');
}else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header( "refresh:3;url=login.php" );
}
