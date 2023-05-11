
<?php
session_start();
require_once('../modele/clientDAO.php');
$messageInscription=false;
$clientDAO = new ClientDAO();

$valider     = (isset($_POST['valider']) ? $_POST['valider'] : null);
if ($valider) {
    $nom     = (isset($_POST['nom']) ? strip_tags(trim($_POST['nom'])) : null);
    $prenom     = (isset($_POST['prenom']) ? strip_tags(trim($_POST['prenom'])) : null);
    $email     = (isset($_POST['email']) ? strip_tags(trim($_POST['email'])) : null);
    $address     = (isset($_POST['address']) ? strip_tags(trim($_POST['address'])) : null);
    $select_paye     = (isset($_POST['select_paye']) ? strip_tags(trim($_POST['select_paye'])) : null);
    $tel     = (isset($_POST['tel']) ? trim($_POST['tel']) : null);
    $mdp     = (isset($_POST['mdp']) ? password_hash(strip_tags(trim($_POST['mdp'])), PASSWORD_ARGON2I) : null); ///*
    $mdpRep    = (isset($_POST['mdpRep']) ? strip_tags(trim($_POST['mdpRep'])) : null); ///*
    $naissance     = (isset($_POST['naissance']) ? $_POST['naissance'] : null);
    
    $valeurs = [
        'prenom' => null,
        'nom' => null,
        'email' => null,
        'address' => null,
        'tel' => null,
        'mdp' => null,
        'naissance' => null,
        'select_paye' => null
    ];
    $erreurs = [
        'nom' => "", 'prenom' => '', 'email' => "", 'address' => "",'select_paye' => "", 'tel' => "", 'mdp' => "", 'naissance' => ""
    ];


    if ($nom != null && strlen($nom) > 1) {
        $valeurs['nom'] = trim($nom);
    } else $erreurs['nom'] = 'nom invalid';


    if ($prenom != null  && strlen($prenom) > 1) {
        $valeurs['prenom'] = $prenom;
    } else $erreurs['prenom'] = ' prenom invalid';


    if ($address != null  && !empty($address)&& $select_paye != null ) {
        $valeurs['address'] = $address;
        $valeurs['select_paye'] = $select_paye;
    } else $erreurs['address'] = 'address or select_paye invalid';


    if ($email != null && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $clientDAO = new ClientDAO();
        $existeEmail = $clientDAO->existeEmail($email);
        if ($existeEmail) {
            $erreurs['email'] = 'email déjà existant ! ';
        } else $valeurs['email'] = $email;
    } else $erreurs['email'] = 'Il faudrait entrer l"adresse e-mail.';


    if ($tel != null) {
        $existeTel = $clientDAO->existeTel($tel);
        if ($existeTel) {
            $erreurs['tel'] = 'le numéro de téléphone saisie déjà existant ! ';
        } elseif (strlen($tel) != 10 || (substr(strval($tel),0,2)!='07'&& substr(strval($tel),0,2)!='06')) {
            $erreurs['tel'] = ' le numéro de téléphone n\'est pas valide   ! ';
        } else $valeurs['tel'] = $tel;
    } else $erreurs['tel'] = 'il faut entrer le tel';


    if ($mdp != null  && strlen($mdp) >= 6) {
        if (!password_verify($mdpRep, $mdp)) {
            $erreurs['mdp'] = 'les mots de pass ne dont pas identiques';
        } else  $valeurs['mdp'] = $mdp;
    } else $erreurs['mdp'] = 'il faut entrer un mdp correct';


    if ($naissance != null) {
        $valeurs['naissance'] = $naissance;
    } else $erreurs['naissance'] = 'il faut entrer la date de naissance';
    $nbErreurs = 0;
    foreach ($erreurs as $erreur) {
        if ($erreur != "") $nbErreurs++;
    }
    if ($nbErreurs == 0) {
        $client = new Client();
        //$client = new Client(10,$nom,$prenom,$email,$address,$tel,$mdp,$naissance);
        $client->setNom($nom);
        $client->setPrenom($prenom);
        $client->setEmail($email);
        $client->setAddress($select_paye." ".$address);
        $client->setTel($tel);
        $client->setMdp($mdp);
        $client->setNaissance($naissance);
        $clientDAO->insert($client);
        header( "refresh:3;url=login.php" );
        $messageInscription=true;
    
    }

}

require_once('../vue/inscriptionView.php');
