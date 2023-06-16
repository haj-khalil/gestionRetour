<?php
require_once('../modele/clientDAO.php');
require_once('../modele/clientClass.php');
session_start();



if (isset($_SESSION['login']) && $_SESSION['login'] == "root") {
    $ClientDAO = new ClientDAO;
    $lesClients = $ClientDAO->getAll();
    $op     = (isset($_GET['op']) ? $_GET['op'] : null);
    $activer = ($op == 'activer');
    $suppr = ($op == 'sC');
    $id_client = isset($_GET['id_client']) ? $_GET['id_client'] : null;
    // suppression
    if ($suppr && !empty($id_client) && $id_client) {

        require_once('../modele/clientDAO.php');
        $clienteDAO = new ClientDAO();
        $clienteDAO->desactiver($id_client);
        header("Refresh:0; url=client.php");
    }
    // deactiver un client 
    if ($activer && !empty($id_client) && $id_client) {

        require_once('../modele/clientDAO.php');
        $clienteDAO = new ClientDAO();
        $clienteDAO->activer($id_client);
        header("Refresh:0; url=client.php");
    }


    $lesRows = [];
    if ($lesClients != []) {

        foreach ($lesClients as $unClient) {
            $ch = '';
            $ch .= '<td >' . $unClient->getId_client() . '</td>';
            $ch .= '<td >' . $unClient->getNom() . '</td>';
            $ch .= '<td >' . $unClient->getPrenom() . '</td>';
            $ch .= '<td >' . $unClient->getEmail() . '</td>';
            $ch .= '<td >' . $unClient->getAddress() . '</td>';
            $ch .= '<td >' . $unClient->getTel() . '</td>';
            $ch .= '<td >' . $unClient->getEtat_client() . '</td>';


            $ch .= '<td><a href="../controleur/retour.php?EmailClient='
                .  $unClient->getEmail() . '"><img style="margin-left: 35%;" src="../vue/style/visu.png"></a></td>';

            $ch .= '<td class="article"><a  onclick="javascript:return confirm(\'Etes-vous sûr de vouloir desactiver ? \')
            " id="supp" href="../controleur/client.php?op=sC&id_client='
                . urlencode($unClient->getId_client())
                . '" ><img style="margin-left: 45%;" src="../vue/style/corbeille.png"></a></td>';

            $ch .= '<td class="article"><a  onclick="javascript:return confirm(\'Etes-vous sûr de vouloir activer ? \')
            " id="activer" href="../controleur/client.php?op=activer&id_client='
                . urlencode($unClient->getId_client())
                . '" ><img  style="margin-left: 35%;"
            src="../vue/style/ajout.png"></a></td>';


            $lignes[] = "<tr>$ch</tr>";
        }
    };

    unset($lesClients);

    require_once('../vue/clientView.php');
} else {
    echo "<h2 style=' text-align: center;'>Désolé, il y a une erreur : vous ne pouvez pas accéder à cette page.</h2>";
    header("refresh:2;url=login.php");
}
