<?php
require_once('../modele/retourDAO.php');
require_once('../modele/retourByArticleDAO.php');
require_once("../modele/statutDAO.php");

session_start();
// if ((time() - $_SESSION['last_login']) > 5 && $_SESSION['login'] != "root") {
// 	echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
// 	header("refresh:3;url=login.php");
// } else 
if (isset($_SESSION['login'])) {

	//n
	$op 	= (isset($_GET['op']) ? $_GET['op'] : null);
	$suppr = ($op == 'sA');
	$id_article = isset($_GET['id_article']) ? $_GET['id_article'] : 1;
	if ($suppr) {

    // suppression
	require_once('../modele/articleDAO.php');
    $articleDAO=new ArticleDAO();
	$articleDAO->delete($id_article);
}
//n

// if ((time() - $_SESSION['last_login']) > 5 && $_SESSION['login'] != "root") {
// 	echo '<h2 style=" text-align: center;">session time est terminé !</h2>';
// 	header("refresh:3;url=login.php");
// } else 
if (isset($_SESSION['login'])) {



	// isAmin est un variable pour definir l'utilisateur  admin ou non
	if ($_SESSION['login'] == 'root') {
		$isAdmin = true;
	} else $isAdmin = false;

	$id                         = isset($_GET['id']) ? $_GET['id'] : null;
	$input_id_statut            = isset($_GET['select_id_statut']) ? $_GET['select_id_statut'] : null;
	$date_remboursement         = isset($_GET['date_remboursement']) ? $_GET['date_remboursement'] : null;
	$updateStatut               = isset($_GET['updateStatut']) ? $_GET['updateStatut'] : null;
	$id_retour_modif_statut     = isset($_GET['id_retour_modif_statut']) ? $_GET['id_retour_modif_statut'] : 2; 
    $adminRechercheClientRetour = isset($_GET['adminRechercheClientRetour']) ? $_GET['adminRechercheClientRetour'] : null;
    $EmailClient                = isset($_GET['EmailClient']) ? $_GET['EmailClient'] : null;
	$op                         = isset($_GET['op']) ? $_GET['op'] : null;
	$supp                       = ($op == 's');
	$detaille                   = ($op == 'd');

	// effacer un retour si op==s et id_retour bien forni
	$retourByArticleDAO = new RetourByArticleDAO();
	if ($supp && isset($_GET['id'])) {
		$retourByArticleDAO->deleteRetourByIdRetour($id);
	}

	// definir ce qu'on va afficher soit isadmin=> tous les retour  , si no il affiche uniquement les retours de l'utilisateur  
	if ($isAdmin) {
		$lesRetours = $retourByArticleDAO->getAll();
	} else {
		$lesRetours = $retourByArticleDAO->infoRetour($_SESSION['login']);
	}
	// la liste des articles by id retour
	$lesArticles = '';
	if (isset($_GET['id'])) {
		$lesArticles = $retourByArticleDAO->getAllArticleByIdRetour($id);
	}

	// definir ce qu'on va afficher soit isadmin et EmailClient not null il affiche les retour de ce client si EmailClient est null il affiche tous les retour, 
	// si no il affiche uniquement les retours de l'utilisateur  
	if ($isAdmin) {
		if ($EmailClient) {
			$lesRetours = $retourByArticleDAO->infoRetour($EmailClient);
		} else $lesRetours = $retourByArticleDAO->getAll();
	} else {
		$lesRetours = $retourByArticleDAO->infoRetour($_SESSION['login']);
	}


	// prepare les infos des articles  
	$lesRows = [];
	if ($lesArticles != []) {
		$lesRows[] = "
				<tr class='article'>
				<th colspan='2'>nom_article </th>
				<th colspan='2'>id_article</th>
				<th colspan='2'> montant_piece</th>
				<th colspan='2'>quantite</th>
				<th colspan='3'>motif</th>
				<th>
    				<button type='button'>
        				<a href='../controleur/editArticle.php?op=d&id_article='>
            				<img id='ajout' src='../vue/style/ajout.png'>
        				</a>
    				</button>
				</th>

				<th><button type='button'><img id='img_x'  onclick='casherTableArticle()' src='../vue/style/x.jpg'></button>
				</th>
				</tr>";
	} else $lesRows[] = "<tr class='article'><th colspan='10'>il n y a pas des articles !</th>
				<th><button type='button'><img id='img_x'  onclick='casherTableArticle()' src='../vue/style/x.jpg'></button>
				</tr>";


	if ($lesArticles != '') {
		foreach ($lesArticles as $uneArticle) {
			$ch = '';

			$ch .= '<td colspan="2" class="article">' . $uneArticle['nom_article'] . '</td>';
			$ch .= '<td colspan="2" class="article">' . $uneArticle['id_article'] . '</td>';
			$ch .= '<td colspan="2" class="article">' . $uneArticle['montant_piece'] . " €" . '</td>';
			$ch .= '<td colspan="2" class="article">' . $uneArticle['quantite'] . '</td>';
			$ch .= '<td colspan="4" class="article">' . $uneArticle['motif'] . '</td>';

			$ch .= '<td class="article"><a href="../controleur/editArticle.php?op=d&id_article='
				. urlencode($uneArticle['id_article']) .
				'"><img src="../vue/style/modification.png"></a></td>';

			// $ch .= '<td class="article"><a href="../controleur/editArticle.php?op=d&id_article='
			// . urlencode($uneArticle['id_article']) .
			// '"><img src="../vue/style/ajout.png"></a></td>';


			$ch .= '<td class="article"><a  onclick="javascript:return confirm(\'Etes-vous sûr de vouloir supprimer ? \') " id="supp"
		href="../controleur/retourAdmin.php?op=sA&id_article='
				. urlencode($uneArticle['id_article'])
				. '" ><img src="../vue/style/corbeille.png"></a></td>';

			$lesRows[] = "<tr>$ch</tr id=table_article'>";


			$lignes	= [];
		}
	}
	foreach ($lesRetours as $unRetour) {
		//calculer le montant totalt de chaque retour selon l' id_retour
		$montantRetour = isset($retourByArticleDAO->montantTotaleRetour($unRetour['id_retour'])[0]["total"]) ?
			$retourByArticleDAO->montantTotaleRetour($unRetour['id_retour'])[0]["total"] : 0;

		$ch = '';
		$ch .= '<td>' . $unRetour['id_retour'] . '</td>';
		$ch .= '<td>' . $unRetour['nom_ens'] . '</td>';
		$ch .= '<td>' . $unRetour['date_achat'] . '</td>';
		$ch .= '<td>' . $unRetour['label'] . '</td>';
		$ch .= '<td>' . $unRetour['date_envoi'] . '</td>';
		$ch .= '<td>' . $unRetour['nom'] . '</td>';
		$ch .= '<td>' . $unRetour['prenom'] . '</td>';
		$ch .= '<td>' . $montantRetour . " €" . '</td>';

		$ch .= '<td><a href="../controleur/retourAdmin.php?op=d&id='
			.  $unRetour['id_retour']
			. '"><img src="../vue/style/visu.png"></a></td>';

		$ch .= '<td><a onclick="javascript:return confirm(\'Etes-vous sûr de vouloir supprimer ? \') " id="supp" href="../controleur/retourAdmin.php?op=s&id='
			. urlencode($unRetour['id_retour'])
			. '" ><img src="../vue/style/corbeille.png"></a></td>';

		$ch .= '<td><a href="../controleur/editRetourArticle.php?op=m&id_client='
			. urlencode($unRetour['id_retour']) .
			'"><img src="../vue/style/modification.png"></a></td>';

		$ch .= '<td><input type="button" onclick="getIdRetour(this.value)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"
	    " value=' . urlencode($unRetour['id_retour']) . '></input></td>';
        
        //nadime
        // $ch .= '<td ><a href="../controleur/editArticle.php?op=d&id_retour='
            // . urlencode($unRetour['id_retour']) .
            // '"><img src="../vue/style/ajout.png"></a></td>';
        //nadime
		$lignes[] = "<tr>$ch</tr>";

		// il affiche les detaille de un retour si op==d 
		if ($id == $unRetour['id_retour'] && $detaille) {
			foreach ($lesRows as $row)
				$lignes[] = $row;
		}
	};

	// les option des status
	$statut = new StatutDAO();
	$lesStatut = $statut->getAll();
	$rows = [];
	foreach ($lesStatut as $row) {
		$ch = '';
		$ch .= '<option value=' . $row->getId_statut() . '>' . $row->getLabel() . '</option>';
		$rows[] = "<tr>$ch</tr>";
	}

	// update un statut et la date_remboursement 
	if ($updateStatut && $input_id_statut != $unRetour['id_statut']  &&  $date_remboursement) {

		if (is_numeric($input_id_statut)) {
			$retour = new RetourDAO();
			$retour->udateRetourStatut($input_id_statut, $id_retour_modif_statut);
			$retour->udateDateRemboursement($id_retour_modif_statut, $date_remboursement);
		}
	}
	unset($lesRetours);

	require_once('../vue/retourView.php');
} else {
	echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
	header("refresh:2;url=login.php");
}
}