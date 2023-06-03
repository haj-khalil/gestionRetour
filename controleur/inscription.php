<?php
session_start();
require_once('../modele/clientDAO.php');
$messageInscription=false;
$clientDAO = new ClientDAO();

$valider = (isset($_POST['valid']) ? $_POST['valid'] : null);
if ($valider) {
    $nom = (isset($_POST['nom']) ? htmlspecialchars(trim($_POST['nom'])) : null);
    $prenom = (isset($_POST['prenom']) ? htmlspecialchars(trim($_POST['prenom'])) : null);
    $email = (isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : null);
    $address = (isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : null);
    $select_pays = (isset($_POST['select_pays']) ? htmlspecialchars(trim($_POST['select_pays'])) : "France");
    $tel = (isset($_POST['tel']) ? trim($_POST['tel']) : null);
    $mdp = (isset($_POST['mdp']) ? password_hash(htmlspecialchars(trim($_POST['mdp'])), PASSWORD_BCRYPT) : null); 
    $mdpRep = (isset($_POST['mdpRep']) ? htmlspecialchars(trim($_POST['mdpRep'])) : null); 
    $naissance = (isset($_POST['naissance']) ? $_POST['naissance'] : null);
    
    $valeurs = [
        'prenom' => null,
        'nom' => null,
        'email' => null,
        'address' => null,
        'tel' => null,
        'mdp' => null,
        'naissance' => null,
        'select_pays' => null
    ];
    $erreurs = [
        'nom' => "", 
        'prenom' => '',
        'email' => "",
        'address' => "",
        'select_pays' => "", 
        'tel' => "", 
        'mdp' => "", 
        'mdpR' => "", 
        'naissance' => ""
    ];


    if ($nom != null && strlen($nom) > 1) {
        $valeurs['nom'] = trim($nom);
    } else $erreurs['nom'] = 'Nom invalide.';


    if ($prenom != null  && strlen($prenom) > 1) {
        $valeurs['prenom'] = $prenom;
    } else $erreurs['prenom'] = 'Prénom invalide.';


    if ($address != null  && !empty($address)  ) {
        $valeurs['address'] = $address;
        $valeurs['select_pays'] = $select_pays;
    } else $erreurs['address'] = 'Adresse invalide.';


    if ($email != null && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $clientDAO = new ClientDAO();
        $existeEmail = $clientDAO->existeEmail($email);
        if ($existeEmail) {
            $erreurs['email'] = 'L\'adresse e-mail est déjà utilisée.';
        } else $valeurs['email'] = $email;
    } else $erreurs['email'] = 'Il faut entrer une adresse e-mail valide.';


    if ($tel != null) {
        $existeTel = $clientDAO->existeTel($tel);
        if (!$existeTel) {
            $valeurs['tel'] = $tel;
        } else  $erreurs['tel'] = 'Le numéro de téléphone est déjà utilisé.';
    } else $erreurs['tel'] = 'il faut entrer le tel';


    if ($mdp != null    && strlen(trim($_POST['mdp']))>= 6) {
        if (!password_verify($mdpRep, $mdp)) {
            $erreurs['mdpR'] = 'les mots de pass ne dont pas identiques';
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
        $client->setNom($nom);
        $client->setPrenom($prenom);
        $client->setEmail($email);
        $client->setAddress($select_pays." , ".$address);
        $client->setTel($tel);
        $client->setMdp($mdp);
        $client->setNaissance($naissance);
       
        header( "refresh:3;url=login.php" );
        $messageInscription=true;
    
    }

}

require_once('../vue/inscriptionView.php');
