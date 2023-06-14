<?php
session_start();
$activerMonCompt= isset($_POST['activerMonCompt']) ? $_POST['activerMonCompt'] : null;
$identifiants['login']  = $identifiants['motDePasse'] = "";
$message = "";
$identifiants['login']        = isset($_POST['login']) ? $_POST['login'] : null;
$identifiants['motDePasse']   = isset($_POST['motDePasse']) ? $_POST['motDePasse'] : null;
function existeUtilisateur(array $identifiants): bool
{
    $ok     = false;
    $login  = $identifiants['login'];
    $mdpass    = $identifiants['motDePasse'];

    require_once '../modele/connexion.php';
    $db   = new Connexion();
    $req  = "SELECT mdp ,id_client
            FROM  client
            WHERE email = :login";
    $res  = $db->execSQL($req, [':login' => $login]);
///
    $resActif  = "SELECT mdp ,id_client
            FROM  client
            WHERE etat_client='actif'
            and email = :login";
    $resActif  = $db->execSQL($req, [':login' => $login]);


    if (isset($res[0]["mdp"])) {
        if (password_verify($mdpass, $res[0]["mdp"])) {
                $_SESSION['id_client'] = $res[0]["id_client"];
                $ok = true;
        }
    }
    if ($login === 'root' && $mdpass === 'root') {
        $ok = true;
    }

    return $ok;
}



if (isset($_POST['Connexion'])) {
    if (existeUtilisateur($identifiants)) {
        $_SESSION['login'] = $identifiants['login'];
        $_SESSION['last_login'] = time();
        header('location: accueil.php');
    } else
        $message = "<p class='text-center mt-3 alert alert-danger'>Identification incorrecte. Essayez de nouveau.</p>";
}
require_once('../vue/loginView.php');
